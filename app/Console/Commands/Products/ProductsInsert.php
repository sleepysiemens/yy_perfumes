<?php

namespace App\Console\Commands\Products;

use App\Models\Category;
use App\Models\Person;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

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
//        $image = $this->downloadImage(asset('images/aron-thumbnail.jpg'));
//        dd($image);

        \DB::table('products')->insert([
            [
                'slug' => Str::slug('Aron – Eau De Parfum 100 ml'),
                'img' => 'aron-thumbnail.jpg',
                'category_id' => Category::inRandomOrder()->first()->id,
                'people_id' => Person::inRandomOrder()->first()->id,
                'title' => json_encode([
                    'en' => 'Aron – Eau De Parfum 100 ml',
                    'ru' => 'Арон-парфюмированная вода 100 мл',
                ]),
                'short_description' => json_encode([]),
                'description' => json_encode([
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
                ]),
                'cost' => rand(150, 300),
                'cost_dealer' => rand(120, 140),
                'cost_vip_dealer' => rand(70, 120),
            ],
            [
                'slug' => Str::slug('Gideon – Eau De Parfum 100 ml'),
                'img' => 'gideon-thumbnail.jpg',
                'category_id' => Category::inRandomOrder()->first()->id,
                'people_id' => Person::inRandomOrder()->first()->id,
                'title' => json_encode([
                    'en' => 'Gideon – Eau De Parfum 100 ml',
                    'ru' => 'Гидеон-парфюмированная вода 100 мл',
                ]),
                'short_description' => json_encode([]),
                'description' => json_encode([
                    'en' => "Le concept de la marque est lié à l'idée de transformer le parfum en un personnage vivant doté
                    de caractère, d'histoire et d'incarnation visuelle, à l'instar des héros littéraires. Sur chaque
                    flacon et étiquette, nous voyons une Description de ce personnage et de ses intérêts. Gideon est
                    un homme de 32 ans avec des tatouages colorés sur son avant-bras. La nature persistante de Gideon
                    en fait un compagnon inoubliable, violent et sauvage. Il est libre et débridé. Un conquérant dont
                    on ne veut pas fuir. Les premières sensations de la datation sont comme de fines lames d'épée
                    disséquant l'air-bergamote et lavande, pamplemousse et ozone. L'espace est rempli d'air chaud de
                    poivre du Sichuan, de géranium, semblable au souffle d'une bête sauvage. La nature passionnée du
                    parfum, ornée de résines nobles. Nous sentons le danger, mais nous ne pouvons pas y résister.
                    Notes de tête: bergamote, lavande, pamplemousse, ozone. Notes moyennes: fleurs de girofle,
                    géranium, Narcisse, tabac, poivre du Sichuan, cèdre, cuir. Notes de base: couleur, Iris, musc,
                    olibanum, labdanum.",

                    'ru' => 'Концепция бренда связана с идеей воплотить аромат в живой персонаж, наделенный характером,
                    историей и визуальным воплощением, подобно литературным героям. На каждом флаконе и этикетке мы видим
                    описание этого персонажа и его интересы.   Gideon- мужчина 32 лет с красочными  татуировками на
                    предплечье. Настойчивый характер Гидеона делает его  незабываемым компаньоном, жестоким и  диким.
                    Он свободен и необуздан.  Завоеватель, от которого не хочется убегать.  Первые ощущения от знакомства,
                    как тонкие лезвия меча, рассекающие воздух - бергамот и лаванда,  грейпфрут и озон. Пространство
                    наполнено  горячим воздухом сычуаньского перца, герани, похожими на дыхание дикого зверя. Страстная
                    природа аромата, украшена благородными смолами.  Мы чувствуем  опасность, но не можем ей противостоять.
                    Верхние ноты: бергамот, лаванда,  грейпфрут, озон.
                    Средние ноты: цветы гвоздики,  герань, нарцисс, табак,  сычуаньский перец, кедр, кожа. Базовые ноты:
                    цивет, ирис, мускус,  олибанум, лабданум.',
                ]),
                'cost' => rand(150, 300),
                'cost_dealer' => rand(120, 140),
                'cost_vip_dealer' => rand(70, 120),
            ],
            [
                'slug' => Str::slug('Ravenna – Eau De Parfum 100 ml'),
                'img' => 'ravenna-thumbnail-600x700.jpg',
                'category_id' => Category::inRandomOrder()->first()->id,
                'people_id' => Person::inRandomOrder()->first()->id,
                'title' => json_encode([
                    'en' => 'Ravenna – Eau De Parfum 100 ml',
                    'ru' => 'Равенна-парфюмированная вода 100 мл',
                ]),
                'short_description' => json_encode([]),
                'description' => json_encode([
                    'en' => "Le concept de la marque est lié à l'idée de transformer le parfum en un personnage vivant
                    doté de caractère, d'histoire et d'incarnation visuelle, à l'instar des héros littéraires.
                    Sur chaque flacon et étiquette, nous voyons une Description de ce personnage et de ses intérêts.
                    RAVENNA est une jeune étudiante en art aux cheveux blonds et au caractère agité. Sous une apparence
                    mignonne et miniature, elle cache un cœur bouillonnant de jeunesse et un tempérament agité.
                    Le parfum Ravenna crée un sentiment d'espièglerie et de coquetterie grâce à une base à fleurs
                    blanches de tubéreuse séduisante et de gardénia laiteux, sous laquelle se cachent des nuances
                    de pêche mûre, de miel blanc délicat et de noix de coco, ainsi que de cèdre acidulé et de
                    daim sensuel. Notes de tête: tubéreuse, gardénia, pêche. Notes moyennes: frangipanier, miel
                    blanc, noix de coco, cèdre, lait. Notes de base: ambre, musc, vanille, daim.",

                    'ru' => 'Концепция бренда связана с идеей воплотить аромат в живой персонаж, наделенный
                    характером, историей и визуальным воплощением, подобно литературным героям. На каждом флаконе и
                    этикетке мы видим описание этого персонажа и его интересы. RAVENNA  - молодая студентка-искусствовед
                    со светлыми волосами и беспокойным характером.  Под миловидным и миниатюрным обликом она  скрывает
                    кипящее молодостью сердце и  неспокойный нрав. Аромат Ravenna создает ощущение  игривости и кокетства
                    благодаря белоцветочной  основе из соблазнительной туберозы и  молочной гардении, под которой
                    скрываются  оттенки спелого персика, нежного белого  меда и кокоса, а также терпкого кедра и
                    чувственной замши.
                    Верхние ноты: тубероза,  гардения, персик.  Средние ноты: франжипани,  белый мед, кокос,
                    кедр, молоко. Базовые ноты: амбра,  мускус, ваниль, замша.',
                ]),
                'cost' => rand(150, 300),
                'cost_dealer' => rand(120, 140),
                'cost_vip_dealer' => rand(70, 120),
            ],
            [
                'slug' => Str::slug('William – Eau De Parfum 100 ml'),
                'img' => 'william-thumbnail.jpg',
                'category_id' => Category::inRandomOrder()->first()->id,
                'people_id' => Person::inRandomOrder()->first()->id,
                'title' => json_encode([
                    'en' => 'William – Eau De Parfum 100 ml',
                    'ru' => 'Уильям-парфюмированная вода 100 мл',
                ]),
                'short_description' => json_encode([]),
                'description' => json_encode([
                    'en' => "Le concept de la marque est lié à l'idée de transformer le parfum en un personnage vivant
                    doté de caractère, d'histoire et d'incarnation visuelle, à l'instar des héros littéraires.
                    Sur chaque flacon et étiquette, nous voyons une Description de ce personnage et de ses intérêts.
                    WILLIAM est un jeune et talentueux designer. Un jeune homme mince et grand, aux cheveux Châtain
                    clair bouclés. Ses intérêts: littérature, art, mode, design. Un parfum qui chante le monde du
                    design et de l'art. Son élégance est basée sur des principes classiques, mais son amour pour le
                    nouveau permet de s'améliorer. Le parfum est créé grâce à la combinaison d'une base classique -
                     mousse de chêne, cèdre et patchouli avec de l'estragon, du vermouth et de la tulipe brillants et
                     modernes. Notes de tête: estragon, bergamote, tulipe. Notes moyennes:
                    thé vert, vermouth, cèdre, patchouli. Notes de base: mousse de chêne, ambre, ambre de baleine.",

                    'ru' => 'Концепция бренда связана с идеей воплотить аромат в живой персонаж,
                    наделенный характером, историей и визуальным воплощением, подобно литературным героям.
                    На каждом флаконе и этикетке мы видим описание этого персонажа и его интересы.
                    WILLIAM -  молодой и талантливый дизайнер. Худощавый высокий юноша, с вьющимися светло - каштановыми
                    волосами. Его интересы: литература, искусство, мода, дизайн. Аромат воспевающий мир дизайна
                    и искусства.  Его элегантность основана на классических  принципах, но его любовь к новому
                    позволяет совершенствоваться. Аромат создан благодаря сочетанию классической  базы - дубовый мох,
                    кедр и пачули с ярким, современным эстрагоном, вермутом  и тюльпаном.  Верхние ноты: эстрагон,
                    бергамот, тюльпан.
                    Средние ноты: зеленый чай,  вермут, кедр, пачули. Базовые ноты: дубовый мох,  янтарь, китовая амбра.',
                ]),
                'cost' => rand(150, 300),
                'cost_dealer' => rand(120, 140),
                'cost_vip_dealer' => rand(70, 120),
            ]
        ]);
    }

    public function downloadImage(string $img)
    {
        $fileName = explode('.', $img);

        $imageName = time() + '.' + $fileName[count($fileName) - 1];

        // Что скачиваем
        $from = $img;
        // Куда скачиваем
        $to = __DIR__ . 'storage/products/' . $imageName;
        $ch = curl_init($from);
        $fp = fopen($to, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        return $imageName;
    }
}
