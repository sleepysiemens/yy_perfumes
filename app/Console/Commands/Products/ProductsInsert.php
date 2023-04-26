<?php

namespace App\Console\Commands\Products;

use App\Models\Category;
use App\Models\Person;
use App\Models\Product;
use Illuminate\Console\Command;

class ProductsInsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Product::create([
            [
                'slug' => 'dsds',
                'img' => 'none',
                'category_id' => Category::inRandomOrder()->first()->id,
                'people_id' => Person::inRandomOrder()->first()->id,
                'title' => [
                    'en' => 'Aron – Eau De Parfum 100 ml',
                    'ru' => 'Арон-парфюмированная вода 100 мл',
                ],
                'short_description' => [],
                'description' => [
                    'en' => "Le concept de la marque est lié à l'idée de transformer le parfum en un personnage vivant doté de caractère,
                    l'histoire et l'incarnation visuelle, comme les héros littéraires. Sur chaque flacon et étiquette, nous voyons
                    Description de ce personnage et ses intérêts. RAVENNA est une jeune étudiante en art aux cheveux blonds
                    et un caractère agité. Sous son apparence mignonne et miniature, elle cache un cœur bouillonnant de jeunesse et
                    un tempérament agité. Le parfum Ravenna crée un sentiment d'espièglerie et de coquetterie grâce à sa base de fleurs blanches
                    de la tubéreuse séduisante et du gardénia laiteux, sous lequel se cachent des nuances de pêche mûre,
                    miel blanc délicat et noix de coco, cèdre acidulé et daim sensuel. Notes de tête: tubéreuse,
                    gardénia, pêche. Notes moyennes: frangipanier, miel blanc, noix de coco, cèdre, lait. Notes de base: ambre,
                    musc, vanille, daim.",

                    'ru' => 'Концепция бренда связана с идеей воплотить аромат в живой персонаж, наделенный характером,
                    историей и визуальным воплощением, подобно литературным героям. На каждом флаконе и этикетке мы видим
                    описание этого персонажа и его интересы. RAVENNA  - молодая студентка-искусствовед со светлыми волосами
                    и беспокойным характером.  Под миловидным и миниатюрным обликом она  скрывает кипящее молодостью сердце и
                    неспокойный нрав. Аромат Ravenna создает ощущение  игривости и кокетства благодаря белоцветочной  основе
                    из соблазнительной туберозы и  молочной гардении, под которой скрываются  оттенки спелого персика,
                    нежного белого  меда и кокоса, а также терпкого кедра и  чувственной замши.  Верхние ноты: тубероза,
                    гардения, персик.  Средние ноты: франжипани,  белый мед, кокос, кедр, молоко. Базовые ноты: амбра,
                    мускус, ваниль, замша.',
                ],
                'cost' => rand(150, 300),
                'cost_dealer' => rand(120, 140),
                'cost_vip_dealer' => rand(70, 120),
            ]
        ]);
    }
}
