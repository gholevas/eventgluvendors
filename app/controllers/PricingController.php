<?php

class PricingController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public static function getPricing($room_id, $start_time, $end_time, $guests_adults, $guests_kids, 
									$food_package, $food_package_kids, $drink_package, $drink_package_kids,
									$addons, $discount_percent, $food_extras = NULL, $kid_food_extras = NULL,
									$drink_extras = NULL, $kid_drink_extras = NULL)
	{
		// Get the to & from second offsets from start of day, as well as TS of day start
		$from = $start_time % (60*60*24); // not used
		$to = $end_time % (60*60*24);
		$date_start = strtotime(date('m/d/Y 00:00:00', $start_time));
		$date_end = strtotime(date('m/d/Y 00:00:00', $end_time));
		$day = date('w', $start_time);

		// Our modals only allow up to 23, so...
		$to = min($to, 60*60*(24-1));

		// If the event overflows into the next day, cap the to seconds to the end of this day
		if (date('m/d/Y', $date_start) != date('m/d/Y', $date_end))
			$to = 60*60*(24-1); // needs to be 23 (I left it 24-1 to make it more obvious) because our calendar modals only go up to 23

		$min_price = self::findMinPrice($room_id, $date_start, $date_end, $day, $to);

		// if we couldn't find any time ranges, then this time isn't available (even if we did, it may STILL be unavailable if already booked)
		if ($min_price == NULL)
		{
			return false; // definitely should use exceptions or something, do that later
		}

		// Going to populate these vars
		$min_food_price_pp = 0;
		$min_drink_price_pp = 0;
		$min_food_price_kids_pp = 0;
		$min_drink_price_kids_pp = 0;

		// get min food package price
		$food_option = Menu::find($food_package);
		$min_food_price_pp = $food_option->min_price;

		// get min kid food package price
		if ($food_package_kids != NULL)
		{
			$food_option_kids = Menu::find($food_package_kids);
			$min_food_price_kids_pp = $food_option_kids->min_price;

		}

		// get min drink package price
		$drink_option = Menu::find($drink_package);
		$min_drink_price_pp = $drink_option->min_price;

		// get min kid drink package price
		if ($drink_package_kids != NULL)
		{
			$drink_option_kids = Menu::find($drink_package_kids);
			$min_drink_price_kids_pp = $drink_option_kids->min_price;
		}

		// Use these variables while calculating prices ("effective" values)
		$adult_food_count_eff = ($food_package_kids == NULL ? $guests_adults + $guests_kids : $guests_adults);
		$kid_food_count_eff = ($food_package_kids == NULL ? 0 : $guests_kids);
		$adult_drink_count_eff = ($drink_package_kids == NULL ? $guests_adults + $guests_kids : $guests_adults);
		$kid_drink_count_eff = ($drink_package_kids == NULL ? 0 : $guests_kids);

		$adult_food_price_eff = $adult_food_count_eff * $min_food_price_pp;
		$kid_food_price_eff = $kid_food_count_eff * $min_food_price_kids_pp;
		$adult_drink_price_eff = $adult_drink_count_eff * $min_drink_price_pp;
		$kid_drink_price_eff = $kid_drink_count_eff * $min_drink_price_kids_pp;

		// Calculate the price given the minimum food rates
		$default_price = $adult_food_price_eff + $adult_drink_price_eff + $kid_food_price_eff + $kid_drink_price_eff;

		// If it doesn't meet the min, make it do so
		if ($default_price < $min_price)
		{
			$remainder = $min_price - $default_price;

			// We want to distribute the remainder by weight, so packages that cost more total will increase more than lower-costing packages
			// The weight will be the cost/total cost for each of the four options 
			$min_food_price_pp += round(($remainder * ($adult_food_price_eff/$default_price))/$adult_food_count_eff, 2);
			$min_drink_price_pp += round(($remainder * ($adult_drink_price_eff/$default_price))/$adult_drink_count_eff, 2);
			if ($kid_food_count_eff > 0)
				$min_food_price_kids_pp += round(($remainder * ($kid_food_price_eff/$default_price))/$kid_food_count_eff, 2);
			if ($kid_drink_count_eff > 0)
				$min_drink_price_kids_pp += round(($remainder * ($kid_drink_price_eff/$default_price))/$kid_drink_count_eff, 2);		
		}

		// Get the total raw price
		$raw_price = ($min_food_price_pp * $adult_food_count_eff
			 + $min_drink_price_pp * $adult_drink_count_eff
			 + $min_food_price_kids_pp * $kid_food_count_eff
			 + $min_drink_price_kids_pp * $kid_drink_count_eff);

		// I'm pretty sure we can only ever be a cent off (otherwise it wouldn't have rounded down to this value), so handle roundoff issues like this
		if ($raw_price < $min_price)
		{
			$min_food_price_pp += .01;
			$min_drink_price_pp += .01;
			$min_food_price_kids_pp += .01;
			$min_drink_price_kids_pp += .01;

			$raw_price = ($min_food_price_pp * $adult_food_count_eff
				 + $min_drink_price_pp * $adult_drink_count_eff
				 + $min_food_price_kids_pp * $kid_food_count_eff
				 + $min_drink_price_kids_pp * $kid_drink_count_eff);
		}

		// Add addons if there are any
		if (is_array($addons)) // this is untested, make sure it works
		{
			foreach ($addons as $addon_id)
			{
				$addon = Addon::find($addon_id);
				$raw_price += $addon->price;
			}
		}

		// Handle menu extras, if any
		if ($food_extras != NULL && is_array($food_extras))
		{
			foreach ($food_extras as $extra_id)
			{
				$extra = MenuExtra::find($extra_id);
				$raw_price += $extra->price * $adult_food_count_eff;
			}
		}

		if ($kid_food_extras != NULL && is_array($kid_food_extras))
		{
			foreach ($kid_food_extras as $extra_id)
			{
				$extra = MenuExtra::find($extra_id);
				$raw_price += $extra->price * $kid_food_count_eff;
			}
		}

		if ($drink_extras != NULL && is_array($drink_extras))
		{
			foreach ($drink_extras as $extra_id)
			{
				$extra = MenuExtra::find($extra_id);
				$raw_price += $extra->price * $adult_drink_count_eff;
			}
		}

		if ($kid_drink_extras != NULL && is_array($kid_drink_extras))
		{
			foreach ($kid_drink_extras as $extra_id)
			{
				$extra = MenuExtra::find($extra_id);
				$raw_price += $extra->price * $kid_drink_count_eff;
			}
		}


		// We're going to add menu extras here

		/*
		$raw_price_pp = $$raw_price/($guests_adults + $guests_kids);
		$final_price = $raw_price;
		*/

		// Get the raw price per person
		$raw_price_pp = round($raw_price/($guests_adults + $guests_kids), 2);

		// Handle any roundoff issues
		$final_price = $raw_price_pp * ($guests_adults + $guests_kids);
		if ($final_price < $min_price)
		{
			$raw_price_pp += .01;
			$final_price = $raw_price_pp * ($guests_adults + $guests_kids);
		}

		// Handle the discount
		$discount_amount = round($final_price * $discount_percent, 2);
		$final_price -= $discount_amount;

		// Handle gratuity (I'm putting these before the tax stuff since I'm assuming this mandatory gratuity is taxed)
		$gratuity = round($final_price * .2, 2); // get the right number...
		$final_price += $gratuity;

		// And finally, the tax
		$tax = round($final_price * .08875, 2);
		$final_price += $tax;

		// Maybe don't round the variables we add, and just round the final result... would be more accurate, 
		// but the numbers we show in the dashboard may not match up

		return array(
						'raw_price' => round($raw_price, 2),
						'raw_price_pp' => round($raw_price_pp, 2),
						'discount_percent' => round($discount_percent, 2),
						'discount_amount' => round($discount_amount, 2),
						'tax' => round($tax, 2),
						'gratuity' => round($gratuity, 2),
						'final_price' => round($final_price, 2),
						'drink_price_pp' => round($min_drink_price_pp, 2),
						'food_price_pp' => round($min_food_price_pp, 2),
						'drink_price_kids_pp' => round($min_drink_price_kids_pp, 2),
						'food_price_kids_pp' => round($min_food_price_kids_pp, 2)
					);
	}

	public static function isAvailable($room_id, $start_time, $end_time, $ignore_event = NULL)
	{
		$events_query = ClientEvent::where('room_id', $room_id)
							 ->where('end_time', '>=', $start_time)
							 ->where('start_time', '<=', $end_time);

		if ($ignore_event !== NULL)
		{
			$events_query->where('id', '<>', $ignore_event);
		}

		$events = $events_query->get();

		return count($events) == 0;
	}

	public static function findMinPrice($room_id, $date_start, $date_end, $day, $to)
	{
		// We're going to get the min price for the tightest bound
		$min_price = NULL;

		// Ensure that this time range is available on day (this does NOT check for other bookings)
		$day_rows = PricingDay::where('room_id', $room_id)
				  ->where('day', $day)
				  ->where('from', '<=', $to)
				  ->where('to', '>=', $to)
				  ->get();

		// Get room min on day
		// Is this right - we don't take into consideration the beginning of the timeslot, just the end time?
		if (count($day_rows) > 0)
		{
			$day_row = PricingDay::where('room_id', $room_id)
				  ->where('day', $day)
				  //->where('from', '<=', $to)
				  ->where('to', '>=', $to)
				  ->orderBy(DB::raw('`to`-`from`'), 'asc') // get the tightest bound time range (so ignore the main one if advanced ones are set)
				  ->first();

			$min_price = $day_row->min_price;
		}

		// Now, if this day was set to closed, clear the min price (very hacky way of organizing this)
		$closed_day_rows = ClosedDay::where('room_id', $room_id)
							   ->where('day', $day)
							   ->get();

		if (count($closed_day_rows) > 0)
			$min_price = NULL;

		// Ensure this time range is available on date
		$date_rows = PricingDate::where('room_id', $room_id)
				  ->where('date', $date_start)
				  ->where('from', '<=', $to)
				  ->where('to', '>=', $to)
				  ->get();

		// get room min on date
		// is this right again - ignore beginning of time range, just find the one that our event's end time falls into
		if (count($date_rows) > 0)
		{
			$date_row = PricingDate::where('room_id', $room_id)
					  ->where('date', $date_start)
					  //->where('from', '<=', $to)
					  ->where('to', '>=', $to)
					  ->orderBy(DB::raw('`to`-`from`'), 'asc') // get the tightest bound time range
					  ->first();

			$min_price = $date_row->min_price;
		}

		// If the event continues to the next day, check if there's a time slot defined the next day at the morning hour that it ends
		// I'm leaving this here for clarity for now, but should be in an if/else with the above code block, or ideally abstracted away into its own function call
		// Indenting it for clarity, & so I remember to reorganize this
			if (date('m/d/Y', $date_start) != date('m/d/Y', $date_end))
			{
				// Ensure that this time range is available on day (this does NOT check for other bookings)
				$new_day = ($day + 1) % 7;
				$to = $end_time % (60*60*24); // use the original $to (obviously sloppy to recalculate this, reorganize later)
				$day_rows = PricingDay::where('room_id', $room_id)
						  ->where('day', $new_day)
						  ->where('from', '<=', $to)
						  ->where('to', '>=', $to)
						  ->get();

				// Get room min on day
				// Is this right - we don't take into consideration the beginning of the timeslot, just the end time?
				if (count($day_rows) > 0)
				{
					$day_row = PricingDay::where('room_id', $room_id)
						  ->where('day', $new_day)
						  //->where('from', '<=', $to)
						  ->where('to', '>=', $to)
						  ->orderBy(DB::raw('`to`-`from`'), 'asc') // get the tightest bound time range (so ignore the main one if advanced ones are set)
						  ->first();
					$min_price = $day_row->min_price;
				}

				// Ensure the time range is available
				$date_rows = PricingDate::where('room_id', $room_id)
						  ->where('date', $date_end)
						  ->where('from', '<=', $to)
						  ->where('to', '>=', $to)
						  ->get();

				// get room min on date
				// is this right again - ignore beginning of time range, just find the one that our event's end time falls into
				if (count($date_rows) > 0)
				{
					$date_row = PricingDate::where('room_id', $room_id)
							  ->where('date', $date_end)
							  //->where('from', '<=', $to)
							  ->where('to', '>=', $to)
							  ->orderBy(DB::raw('`to`-`from`'), 'asc') // get the tightest bound time range
							  ->first();

					$min_price = $date_row->min_price;
				}
			}

		// If this date was set to closed, set min price to NULL
		$closed_date_rows = ClosedDate::where('room_id', $room_id)
								 ->where('date', $date_start)
								 ->get();

		if (count($closed_date_rows) > 0)
			$min_price = NULL;

		return $min_price;
	}

}
