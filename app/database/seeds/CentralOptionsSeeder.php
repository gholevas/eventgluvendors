<?php

class CentralOptionsSeeder extends Seeder {

	public function run()
	{
		$passing_menu = array(
								'name' => 'Passing Menu',
								'price' => 25
							);

		$passing_menu['details'] = "
<p><h4 style='color: #83c23f'>Hors d’oeuvres</h4></p>

<strong>Cheese Pies</strong>
<p>A mixture of kefalograviera & feta cheese, wrapped in crispy filo dough pastry</p>

<strong>Spinach Pies</strong>
<p>Spinach pie, made from a mixture of fresh spinach, leeks, onion and feta, wrapped in crispy filo dough pastry</p>

<strong>Keftedes</strong>
<p>Traditionally made Greek meatballs garnished with fresh herbs and lemon juice</p>

<strong>Chicken Souvlaki</strong>
<p>Skewered chicken garnished lightly with ladolemono sauce</p>

<strong>Pork Souvlaki</strong>
<p>Skewered cubed pork lightly drizzled with ladolemono sauce</p>

<strong>Cheese & Fruit Platters</strong>
<p>Assortment of Greek cheeses: kasseri, kefalograviera, halloumi and feta, accompanied with dry fruit</p>
";

		$buffet_menu = array(
								'name' => 'Buffet Menu',
								'price' => 40,
								'addons' => array(
													array('Calamari', 3.50),
													array('Filet Mignon', 8.00),
													array('Roasted Leg of Lamb', 8.00),
													array('Turkey', 5.00),
													//array('Sushi Boat (80pc)', 150.00)
												)
							);

		$buffet_menu['details'] = <<<EOF
<p><h4 style='color: #83c23f'>Buffet Items</h4></p>

<strong>Mesclun Salad</strong>
<p>Garnished with extra virgin olive oil and balsamic vinegar</p>

<strong>Pork Souvlaki</strong>
<p>Cubed pork cooked on a skewer garnished with ladolemono sauce</p>

<strong>Grilled Boneless Chicken Breast</strong>
<p>garnished with ladolemono sauce</p>

<strong>Grilled Salmon</strong>
<p>Succulent salmon steak garnished with ladolemono sauce and topped with capers</p>

<strong>Penne a la Ouzo</strong>
<p>Freshly made pasta covered in a flavorful pink ouzo sauce</p>

<p><h4 style='color: #83c23f'>Side</h4></p>
<p>Lemon Potatoes or Steamed Vegetables</p>

<p><h4 style='color: #83c23f'>Dessert</h4></p>
<p>Homemade tiramisu cake</p>

<p><h4 style='color: #83c23f'>Coffee</h4></p>
<p>American coffee and tea</p>
EOF;

		$standard_menu = array(
								'name' => 'Standard Menu',
								'price' => 45,
								'addons' => array(
													array('Calamari', 3.50),
													array('Saganaki', 3.00),
													array('Grilled Lamb Chops', 8.00),
													//array('Sushi Boat (80pc)', 150.00),
													array('Shrimp & Vegetables for Penne', 2.00)
												)
								);
		$standard_menu['details'] = <<<EOF
<p><h4 style='color: #83c23f'>Appetizers</h4></p>

<strong>Pikilia</strong>
<p>A sampling of our homemade traditional Greek spreads: taramosalata, skordalia, tzatziki and hummus</p>

<strong>Keftedes</strong>
<p>Traditionally made Greek meatballs garnished with fresh herbs & lemon juice</p>

<p><h4 style='color: #83c23f'>Salad</h4></p>
<strong>Horiatiki Salad</strong>
<p>Authentic Greek salad with, ripe tomatoes, cucumber, peppers, onions and feta cheese garnished with a red wine vinaigrette and extra virgin olive oil</p>

<p><h4 style='color: #83c23f'>Entrees (choice of)</h4></p>

<strong>Grilled Salmon</strong>
<p>Succulent salmon steak served with lemon potatoes and steamed mixed Julienned vegetables garnished with ladolemono sauce and topped with capers</p>

<strong>Grilled boneless Chicken</strong>
<p>Seasoned free-range chicken with fresh herbs served with lemon potatoes and steamed mixed julienned vegetables and garnished with ladolemono sauce</p>

<strong>Penne a la Ouzo</strong>
<p>Freshly made pasta covered in a flavorful pink ouzo sauce</p>

<p><h4 style='color: #83c23f'>Dessert</h4></p>
<p>Homemade tiramisu Cake</p>

<p><h4 style='color: #83c23f'>Coffee</h4></p>
<p>American Coffee and tea</p>
EOF;

			$traditional_menu = array(
										'name' => 'Traditional Menu',
										'price' => 60,
										'addons' => array(
															array('Calamari', 3.50),
															array('Saganaki', 3.00),
															//array('Sushi Boat (80pc)', 150.00)
														)
									);

			$traditional_menu['details'] = <<<EOF
<p><h4 style='color: #83c23f'>Appetizers</h4></p>

<strong>Pikilia</strong>
<p>A sampling of our homemade traditional Greek spreads: taramosalata, skordalia, tzatziki and hummus</p>

<strong>Calamari</strong>
<p>Lightly pan fried calamari served with marinara sauce</p>

<strong>Keftedes</strong>
<p>Traditionally made Greek meatballs garnished with fresh herbs &amp; lemon</p>

<p><h4 style='color: #83c23f'>Salad</h4></p>
<strong>Horiatiki Salad</strong>
<p>Authentic Greek salad with, ripe tomatoes, cucumber, peppers, onions and feta cheese garnished with a red wine vinaigrette and extra virgin olive oil</p>

<p><h4 style='color: #83c23f'>Entrees (choice of)</h4></p>

<strong>Grilled Salmon</strong>
<p>Succulent salmon steak served with lemon potatoes and steamed mixed julienned vegetables served With ladolemono sauce and topped with capers</p>

<strong>Grilled boneless Chicken</strong>
<p>Seasoned free-range chicken with fresh herbs served with lemon potatoes and steamed mixed Julienned vegetables and garnished with ladolemono sauce</p>

<strong>Filet Mignon</strong>
<p>10 oz. Filet Mignon with a demi-glace and red wine reduction, grilled to your preference, served with Lemon potatoes and steamed mixed julienned vegetables</p>
<p>-OR-</p>
<strong>Grilled Lamb Chops</strong>
<p>Seasoned lamb chops grilled to your preference, served with Lemon potatoes and steamed mixed julienned vegetables</p>

<p><h4 style='color: #83c23f'>Dessert</h4></p>
<p>Homemade tiramisu Cake</p>

<p><h4 style='color: #83c23f'>Coffee</h4></p>
<p>American Coffee and tea</p>
EOF;

			$premier_menu = array(
									'name' => 'Premier Menu',
									'price' => 70,
									'addons' => array(
														array('Calamari', 3.50),
														array('Saganaki', 3.00),
														//array('Sushi Boat (80pc)', 150.00),
														array('Shrimp & Vegetables for Penne', 2.00)
													)
								);

			$premier_menu['details'] = <<<EOF
<p><h4 style='color: #83c23f'>Appetizers</h4></p>

<strong>Pikilia</strong>
<p>A sampling of our homemade traditional Greek spreads: taramosalata, skordalia, tzatziki and hummus.</p>

<strong>Calamari</strong>
<p>Lightly pan fried calamari served with marinara sauce</p>

<strong>Keftedes</strong>
<p>Traditionally made Greek meatballs garnished with fresh herbs and lemon juice</p>

<strong>Saganaki</strong>
<p>Lightly pan fried and flambéed kefalograviera cheese garnished with oregano and lemon</p>

<strong>Garides Souvlaki</strong>
<p>Char grilled shrimps on a skewer garnished with ladolemono sauce</p>

<p><h4 style='color: #83c23f'>Salad</h4></p>
<strong>Horiatiki Salad</strong>
<p>Authentic Greek salad with, ripe tomatoes, cucumber, peppers, onions and feta cheese garnished with a red wine vinaigrette and extra virgin olive oil</p>

<p><h4 style='color: #83c23f'>Entrees (choice of)</h4></p>

<strong>Grilled Salmon</strong>
<p>Succulent salmon steak served with lemon potatoes and steamed mixed Julienned vegetables garnished with ladolemono sauce and topped with capers</p>

<strong>Grilled boneless Chicken</strong>
<p>Seasoned free-range chicken with fresh herbs served with lemon potatoes and steamed mixed julienned vegetables and garnished with ladolemono sauce</p>

<strong>Penne ala Ouzo</strong>
<p>Freshly made pasta covered in a flavorful pink ouzo sauce</p>

<strong>Filet Mignon</strong>
<p>10 oz. Filet Mignon, grilled to your preference, with a red wine demi-glace reduction, served with Lemon potatoes and steamed mixed julienned vegetables</p>
<p>-or-</p>
<strong>Grilled Lamb Chops</strong>
<p>Seasoned lamb chops grilled to your preference, served with Lemon potatoes and steamed mixed julienned vegetables</p>

<p><h4 style='color: #83c23f'>Dessert</h4></p>
<p>Homemade tiramisu cake</p>

<p><h4 style='color: #83c23f'>Coffee</h4></p>
<p>American coffee and tea</p>

EOF;

			$sweet_16_menu = array(
									'name' => 'Sweet 16 Menu',
									'price' => 55,
									'addons' => array(
														array('Calamari', 3.00),
														array('Saganaki', 3.00),
														//array('Sushi Boat (80pc)', 150.00)
													)
								);

			$sweet_16_menu['details'] = <<<EOF
<p><h4 style='color: #83c23f'>Food</h4></p>
<strong>Mesclun Salad</strong>
<p>Garnished with extra virgin olive oil and balsamic vinegar</p>

<strong>Pork Souvlaki</strong>
<p>Cubed pork cooked on a skewer garnished with ladolemono sauce</p>

<strong>Grilled boneless Chicken</strong>
<p>Garnished with ladolemono sauce</p>

<strong>Penne a la Ouzo</strong>
<p>Freshly made pasta covered in a flavorful pink ouzo sauce</p>

<p><h4 style='color: #83c23f'>Sides</h4></p>
<p>French Fries<br />
Chicken Fingers<br />
Mozzarella Sticks<br />
Lemon Potatoes<br />
-or-<br />
Steamed Vegetables</p>

<p><h4 style='color: #83c23f'>Dessert</h4></p>
<p>Homemade tiramisu cake</p>

<p><h4 style='color: #83c23f'>Coffee</h4></p>
<p>American coffee and tea</p>
EOF;


			$premium_bar['name'] = 'Premium Open Bar';
			$premium_bar['price'] = 40;
			$premium_bar['details'] = <<<EOF
<p>Premium open bar for the duration of the event.</p>
<i>Certain exclusions apply</i>
EOF;
			$call_liquor['name'] = 'Call Liquor Open Bar';
			$call_liquor['price'] = 25;
			$call_liquor['details'] = <<<EOF
<p>Call liquor open bar for the duration of the event.</p>
<i>Certain exclusions on beer</i>
EOF;

			$beer_wine_soda['name'] = 'Beer Wine & Soda';
			$beer_wine_soda['price'] = 15;
			$beer_wine_soda['details'] = <<<EOF
Free pour on beer, wine and soda for the duration of the event (4 hours), Bar Tab on all other Alcoholic beverages to be settled in addition to quoted cost at the close of the event or otherwise designated time.
EOF;

			$cash_bar['name'] = 'Cash Bar';
			$cash_bar['price'] = 0;
			$cash_bar['details'] = <<<EOF
Patrons will pay for their drinks
EOF;

			$bar_tab['name'] = 'Bar Tab';
			$bar_tab['details'] = <<<EOF
All beverages will be placed on a bar tab to be settled in addition to your food cost at a specified time or at the end of the event.
EOF;
			$bar_tab['price'] = 0;

			$food_options = array(
									'passing_menu',
									'buffet_menu',
									'standard_menu',
									'traditional_menu',
									'premier_menu',
									'sweet_16_menu'
								);

			$drink_options = array(
									'premium_bar',
									'call_liquor',
									'beer_wine_soda',
									'cash_bar',
									'bar_tab'
								);

			foreach ($food_options as $food_option)
			{
				$option = new Menu();
				$option->type = 0;
				$option->venue_id = 1;
				$option->name = ${$food_option}['name'];
				$option->description = ${$food_option}['details'];
				$option->min_price = ${$food_option}['price'];	
				$option->save();

				if (isset(${$food_option}['addons']))
				{
					foreach (${$food_option}['addons'] as $addon)
					{
						$extra = new MenuExtra();
						$extra->menu_id = $option->id;
						$extra->name = $addon[0];
						$extra->price = $addon[1];
						$extra->save();
					}
				}
			}

			foreach ($drink_options as $drink_option)
			{
				$option = new Menu();
				$option->type = 1;
				$option->venue_id = 1;
				$option->name = ${$drink_option}['name'];
				$option->description = ${$drink_option}['details'];
				$option->min_price = ${$drink_option}['price'];
				$option->save();	

				if (isset(${$drink_option}['addons']))
				{
					foreach (${$drink_option}['addons'] as $addon)
					{
						$extra = new MenuExtra();
						$extra->menu_id = $option->id;
						$extra->name = $addon[0];
						$extra->price = $addon[1];
						$extra->save();
					}
				}
			}

	}

}