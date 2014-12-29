<?php

class MenuSeeder extends Seeder {

	public function run()
	{
		$venue_id = 1;

		// Add food menus
		for ($i = 0; $i < 3; $i++)
		{
			$menu = new Menu();
			$menu->venue_id = 1;
			$menu->name = 'Food Menu ' . ($i+1);
			$menu->type = 0;
			$menu->min_price = 5;
			$menu->description = 'Example food menu #' . ($i+1);
			$menu->save();

			// Add some menu extras
			for ($j = 0; $j < 2; $j++)
			{
				$extra = new MenuExtra();
				$extra->menu_id = $menu->id;
				$extra->name = 'Extra #' . ($j + 1);
				$extra->description = 'Test Extra #' . ($j + 1);
				$extra->price = 3;
				$extra->save();
			}
		}

		// Drink menus
		for ($i = 0; $i < 3; $i++)
		{
			$menu = new Menu();
			$menu->venue_id = 1;
			$menu->name = 'Drink Menu ' . ($i+1);
			$menu->type = 1;
			$menu->min_price = 5;
			$menu->description = 'Example drink menu #' . ($i+1);
			$menu->save();

			// Add some menu extras
			for ($j = 0; $j < 2; $j++)
			{
				$extra = new MenuExtra();
				$extra->menu_id = $menu->id;
				$extra->name = 'Extra #' . ($j + 1);
				$extra->description = 'Test Extra #' . ($j + 1);
				$extra->price = 3;
				$extra->save();
			}
		}

		// Add general addons
		$addon = new Addon();
		$addon->venue_id = 1;
		$addon->name = 'Example addon 1';
		$addon->price = 100;
		$addon->save();

		$addon = new Addon();
		$addon->venue_id = 1;
		$addon->name = 'Example addon 2';
		$addon->price = 150;
		$addon->save();
	}
}