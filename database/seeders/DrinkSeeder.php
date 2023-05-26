<?php

namespace Database\Seeders;

use App\Models\Drink;
use Illuminate\Database\Seeder;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drinksData = [
            [
                'name' => 'Coca-Cola',
                'description' => 'Coca-Cola, or Coke, is a carbonated soft drink manufactured by the Coca-Cola Company. Originally marketed as a temperance drink and intended as a patent medicine, it was invented in the late 19th century by John Stith Pemberton in Atlanta, Georgia. In 1888, Pemberton sold Coca-Cola`s ownership rights to Asa Griggs Candler, a businessman, whose marketing tactics led Coca-Cola to its dominance of the global soft-drink market throughout the 20th and 21st century.[1] The drink`s name refers to two of its original ingredients: coca leaves and kola nuts (a source of caffeine). The current formula of Coca-Cola remains a closely guarded trade secret; however, a variety of reported recipes and experimental recreations have been published. The secrecy around the formula has been used by Coca-Cola in its marketing as only a handful of anonymous employees know the formula.[2] The drink has inspired imitators and created a whole classification of soft drink: colas.',
                'sugar_grams_per_100ml' => 10.3,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/b/b0/Coca-Cola_Cherry_Poland.png'
            ],
            [
                'name' => 'Fanta',
                'description' => 'Fanta is an American-owned German brand of fruit-flavored carbonated soft drinks created by Coca-Cola Deutschland under the leadership of German businessman Max Keith. There are more than 200 flavors worldwide. Fanta originated in Germany as a Coca-Cola alternative in 1940 due to the American trade embargo of Nazi Germany, which affected the availability of Coca-Cola ingredients. Fanta soon dominated the German market with three million cans sold in 1943. The current formulation of Fanta was developed in Italy in 1955.',
                'sugar_grams_per_100ml' => 4.6,
                'image_url' => 'https://hurtownia-napoje.pl/environment/cache/images/0_0_productGfx_2718/Fanta-Pomaranczowa-250ml-karton.jpg'
            ],
            [
                'name' => 'Sprite',
                'description' => 'Sprite (ang. sprite – „duszek, chochlik”[1]) – marka napoju gazowanego o smaku cytrynowo-limonkowym należąca do The Coca-Cola Company. Napój Sprite został wprowadzony na rynek w USA w 1961 roku, w Polsce od 1991 roku. Jest to odpowiedź firmy na popularny napój 7 Up firmy Pepsi. Dostępne na światowym rynku rodzaje napoju to: Sprite Zero (dietetyczny), Mint flavored Sprite (z nutą mięty), Sprite Blue (w kolorze niebieskim), Sprite 3G (napój typu energy drink), Sprite Remix (różne wariacje z aromatami owocowymi), Sprite Remix Berry Clear (owoce leśne), Sprite Remix Baja (owoce tropikalne), Sprite Remix Aruba Jam, Ice Sprite (orzeźwiający miętowy smak), Sprite Cucumber (ogórkowy).',
                'sugar_grams_per_100ml' => 8.6,
                'image_url' => 'https://i.iplsc.com/zdjecie-ilustracyjne/000FUW73R5DF5CEV-C116-F4.webp'
            ],
            [
                'name' => 'Solo',
                'description' => 'Solo is an orange-flavoured soft drink, owned by the Norwegian companies Ringnes, Oskar Sylte, and Mack.[1] The recipe was originally Spanish, and brought to the CEO of Tønsberg Bryggeri, Theodor W. Holmsen, by Torleif Gulliksrud in 1934. Solo quickly became Norway`s most popular soft drink, and until the 1960s was bigger than Coca-Cola in Norway.[2][3] In 1999, Pepsi passed Solo in market share, leaving Solo as third most popular.',
                'sugar_grams_per_100ml' => 11.5,
                'image_url' => 'https://thornews.files.wordpress.com/2012/03/solo-gjennom-c3a5rene.jpg'
            ],
            [
                'name' => 'Bundaberg: Ginger Beer',
                'description' => 'Bundaberg Brewed Drinks Pty Ltd is an Australian family-owned business that brews non-alcoholic beverages. Based in Bundaberg, Queensland, they export to over 61 countries across the globe and they are most known for their ginger beer and other carbonated beverages.',
                'sugar_grams_per_100ml' => 10.8,
                'image_url' => 'https://i.ebayimg.com/images/g/vwQAAOSwDNdVzfGn/s-l1600.jpg'
            ],
        ];

        foreach ($drinksData as $drink) {
            Drink::create($drink);
        }
    }
}
