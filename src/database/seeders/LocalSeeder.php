<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Bland;
use App\Models\Users;
use App\Models\History;
use App\Models\Image;
use App\Models\Product_size;
use App\Models\Product;
use App\Models\Cart;
use Carbon\Traits\Date;
use App\Models\Category;
use Brick\Math\BigInteger;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //簡単なテストデータ用
        // Users::factory([
        //     'name' => 'test',
        //     'email' => 'test@test.com',
        // ])->create();

        $blands = [
            [
                'id' => 1,
                'bland_name' => 'リーガル',
            ],
            [
                'id' => 2,
                'bland_name' => 'スコッチグレイン',
            ],
            [
                'id' => 3,
                'bland_name' => 'ユニオンインペリアル',
            ],
            [
                'id' => 4,
                'bland_name' => '三陽山長',
            ],
            [
                'id' => 5,
                'bland_name' => 'シェットランドフォックス',
            ],
            [
                'id' => 6,
                'bland_name' => 'エドワードグリーン',
            ],
            [
                'id' => 7,
                'bland_name' => 'チャーチ',
            ],
            [
                'id' => 8,
                'bland_name' => 'トリッカーズ',
            ],
            [
                'id' => 9,
                'bland_name' => 'クロケットジョーンズ',
            ],
            [
                'id' => 10,
                'bland_name' => 'ジョンロブ',
            ],
        ];
        DB::table('blands')->insert($blands);

        $categories = [
            [
                'id' => 1,
                'name_jp' => 'ストレートチップ',
            ],
            [
                'id' => 2,
                'name_jp' => 'ウイングチップ',
            ],
            [
                'id' => 3,
                'name_jp' => 'ダブルモンク',
            ],
            [
                'id' => 4,
                'name_jp' => 'ローファー',
            ],
        ];
        DB::table('categories')->insert($categories);
        $sizes = [
            [
                'id' => 1,
                'size' => '24.5',
            ],
            [
                'id' => 2,
                'size' => '25.0',
            ],
            [
                'id' => 3,
                'size' => '25.5',
            ],
            [
                'id' => 4,
                'size' => '26.0',
            ],
            [
                'id' => 5,
                'size' => '26.5',
            ],
            [
                'id' => 6,
                'size' => '27.0',
            ],
            [
                'id' => 7,
                'size' => '27.5',
            ],
            [
                'id' => 8,
                'size' => '28.0',
            ],
        ];
        DB::table('sizes')->insert($sizes);

        $blands = Bland::all();
        $sizes = Size::all();
        $categories = Category::all();

        $products = [
            [
                'id' => 1,
                'product_name' => 'PETER D',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 85800,
                'detail' =>
                    '履き口部分を広くすることで着脱のしやすい仕様。バックルは英国的な雰囲気が出るようシンプルに、やや小ぶりのサイズ感が洗練された上品な足元を演出してくれます。',
                'image' => 'img/products/64-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 2,
                'product_name' => 'FAWKES 3 D',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 83600,
                'detail' =>
                    'かかと周りにまでぐるりとコバがあしらわれたオールアラウンドグッドイヤーウェルト製法など、カントリーテイストを彷彿させるディテール。',
                'image' => 'img/products/01-0.jpg', //ばらけて入れていく
                'stock' => 10,
            ],
            [
                'id' => 3,
                'product_name' => 'BRECON C',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 40000,
                'detail' =>
                    'ラストは甲が広くて踵が小ぶりという日本人の足型に合いやすい125ラストを採用。ソールには実用性と品の良さを兼ね備えた梅雨時期でも使いやすいダイヤモンドラバーソールを使用し、高いグリップ力を備えながら見た目はスマートに。',
                'image' => 'img/products/02-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 4,

                'product_name' => 'DALIA WOMEN',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 81800,
                'detail' => 'エッジに施されたスタッズがアクセントになったサンダルDALIA(ダリア)。
                            フロント2か所のワイドストラップと、バックストラップによりホールド感のある履き心地。また重厚感のあるルックスながらトゥの開きが程よい抜け感を演出してくれます。',
                'image' => 'img/products/03-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 5,

                'product_name' => 'MALVERN C',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 80030,
                'detail' =>
                    'トラディショナルな外羽根プレーントゥモデルのMALVERN C(マルバーン)。 ',
                'image' => 'img/products/04-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 6,

                'product_name' => 'HUDSON',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78000,
                'detail' =>
                    'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーのメンズコレクション。「Purely Made in England」というポリシーを掲げるジョセフチーニーより。',
                'image' => 'img/products/05-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 7,

                'product_name' => 'FENCHURCH',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 48400,
                'detail' =>
                    '11028 LAST(木型)はチーニーが展開しているラストの中ではロングノーズです。パンチドキャップトゥがすっきりと端正な見映えになっていてドレススタイルには最適な1足。',
                'image' => 'img/products/06-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 8,

                'product_name' => '[限定]MAYAR C',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78000,
                'detail' => 'マイヤーのコンセプトは、「都会で履くエレガントなカントリーシューズ」。
                            外羽根や独特のステッチワーク、かかと周りにまでぐるりとコバがあしらわれたオールアラウンドグッドイヤーウェルト製法など、カントリーテイストを彷彿させるディテールながら、ブラックのグレインカーフレザーを使用することで、エレガントさとタフさを兼ね備えました。',
                'image' => 'img/products/07-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 9,
                'product_name' => 'FRANCIS',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 75900,
                'detail' => 'オン・オフでご使用いただけるクラシックかつトラディショナルな王道のセミブローグモデルのFRANCIS(フランシス)。
                            ',
                'image' => 'img/products/08-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 10,

                'product_name' => 'GEOFFREY',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 75900,
                'detail' => 'フォーマルスタイルにおける王道のストレートチップドレスシューズのGEOFFREY(ジェフェリー)。
                            ',
                'image' => 'img/products/09-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 11,
                'product_name' => 'ROGER',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 75900,
                'detail' => 'フォーマルスタイルにおすすめのクォーターブローグシューズのROGER(ロジャー)。
                            アッパーは、ボックスカーフ使いで足馴染みも良く、古くからある6184 LAST(木型)を採用。日本人の足にも相性の良い小ぶりなヒールカップ、細身のEウィズ仕様により心地の良いフィッティングとなっております。',
                'image' => 'img/products/10-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 12,
                'product_name' => 'CAIRNGORM H',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 72300,
                'detail' => 'ジョセフ チーニーを代表するシューズ"CAIRNGORM 2R(ケンゴン)"にドレスとカジュアルの要素を融合したハイブリッドモデルが登場。
                            外羽根や独特のステッチワーク、頑強なグッドイヤーウェルト製法など従来のケンゴンのディテールを残しつつ、ビジネスシーンでもお使いいただけるよう、内ハトメ仕様などスマートな要素を取り入れました。
                            ',
                'image' => 'img/products/11-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 13,
                'product_name' => 'WILFORD JR',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 60803,
                'detail' => '16世紀頃のスコットランドやアイルランドで履かれたブローギング(飾り穴)が施された靴は、通気性や水はけを良くする工夫としてあしらわれ、今では装飾性の高い意匠となって継承されています。
            ',
                'image' => 'img/products/12-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 14,
                'product_name' => 'DIPLOMAT(LAST 173) ',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 91300,
                'detail' =>
                    'ラスト173を採用し、英国の風格が飾り穴から醸し出されるセミブローグモデルのDIPLOMAT(ディプロマット)。',
                'image' => 'img/products/13-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 15,
                'product_name' => 'OLD',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 42400,
                'detail' =>
                    '装飾の少ないシンプルなデザインでスッキリとした、革の表情も楽しめるプレーントゥシューズのOLD(オールド)。 ',
                'image' => 'img/products/14-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 16,
                'product_name' => 'PENZANCE 2',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 48439,
                'detail' =>
                    'カーフレザーをアッパーに使用したグルカサンダルのPENZANCE 2(ペンザス 2)。',
                'image' => 'img/products/15-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 17,
                'product_name' => 'CARTMEL(LAST173) ',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 91300,
                'detail' =>
                    '英国を代表する老舗シューズブランドチャーチより、上品でクラシックなイメージのラスト173を使用したダービーキャップトゥシューズ。',
                'image' => 'img/products/16-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 18,
                'product_name' => 'BUCKINGHAM',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 87106,
                'detail' =>
                    'ビスポークシューズの雰囲気を感じさせる特別仕様で英国のクラフトマンシップをご堪能いただける一足。',
                'image' => 'img/products/17-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 19,
                'product_name' => 'HOLYROOD',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 87100,
                'detail' =>
                    'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーのメンズコレクション。',
                'image' => 'img/products/18-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 20,
                'product_name' => 'HARRY',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 71200,
                'detail' =>
                    '伝統的な製法、技術により靴をつくり続けるジョセフ チーニーのタッセルローファーHARRY(ハリー)。',
                'image' => 'img/products/19-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 21,
                'product_name' => 'BROAD II',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 48900,
                'detail' =>
                    'オーセンティックで、バランスのいいウィングチップシューズのBROAD ??(ブロード)。',
                'image' => 'img/products/20-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 22,

                'product_name' => 'CAIRNGORM 2R/',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 80200,
                'detail' => 'トラディショナルな外羽根キャップトゥモデルのCAIRNGORM 2R(ケンゴン)。
                            無骨ながら愛嬌のある表情とミルスペックを満たす履き心地。',
                'image' => 'img/products/21-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 23,
                'product_name' => 'LIME',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 40000,
                'detail' => 'ジョセフチーニーのストレートチップモデルLIME(ライム)。
                            ロングノーズのエレガントな雰囲気が漂いながらもボールジョイントに比較的ゆとりがある11028 LAST(木型)。',
                'image' => 'img/products/22-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 24,
                'product_name' => 'FENCHURCH1',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 64900,
                'detail' => 'シティコレクションのクォーターブローグモデルFENCHURCH(フェンチャーチ)。
                            11028 LAST(木型)はチーニーが展開しているラストの中ではロングノーズです。',
                'image' => 'img/products/23-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 25,
                'product_name' => 'ALDERTON',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 48000,
                'detail' =>
                    '外羽根ながらプレーントゥでフォーマルな印象のALDERTON(アルダートン)。',
                'image' => 'img/products/24-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 26,
                'product_name' => 'ASTWELL/',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10200,
                'detail' =>
                    'ブローグが施された一本ラインが入るパンチドキャップトゥのASTWELL(アストウェル)。',
                'image' => 'img/products/25-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 27,
                'product_name' => 'AVON C',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 81500,
                'detail' => '大振りな飾り穴がカントリーテイストを一層引き立てるAVON C(エイボンC)。
                            バランスの良いフォルムに穴取りの大きいブローグ、ぽってりとしたラウンドトゥ、頑強なグッドイヤーウェルト製法、厚みのあるソールなど、無骨さと洗練さを兼ね備えたトラディショナルなカントリーシューズ。',
                'image' => 'img/products/26-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 28,
                'product_name' => 'GRAFTON (LAST 173)',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 103400,
                'detail' =>
                    'チャーチ愛用者はご存知の方も多い外羽根式フルブローグの名作GRAFTON(グラフトン)。',
                'image' => 'img/products/27-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 29,
                'product_name' => 'GRAFTONⅡ',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 130000,
                'detail' => 'チャーチ愛用者はご存知の方も多い外羽根式フルブローグの名作GRAFTON(グラフトン)
                            EU離脱後の思いをぶつけた一足',
                'image' => 'img/products/28-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 30,
                'product_name' => 'CHETWYND (LAST 173) /',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 96800,
                'detail' => 'オーセンティックで、バランスの取れたウィングチップのCHETWYND(チェットウィンド)。
                            ',
                'image' => 'img/products/31-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 31,
                'product_name' => 'ALFRED',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78120,
                'detail' =>
                    'オックスフォードといわれる1番人気で定番のストレートチップモデルALFRED(アルフレッド)。',
                'image' => 'img/products/31-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 32,
                'product_name' => 'CONSUL2',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 91300,
                'detail' => '
                            ラスト173による優美なフォルムとトゥキャップのボリュームバランス、絶妙に張り出したコバも、まさに英国靴といった絶妙さ。靴好きならひと目でチャーチと分かるシルエットは、まさにブランドのアイコニックモデルと言っても過言ではありません。',
                'image' => 'img/products/32-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 33,
                'product_name' => 'HUDSON2',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 59400,
                'detail' => '
                            ジョセフ チーニーのローファーラインナップにおいて最定番に位置づけられるモデルのHUDSON(ハドソン)。',
                'image' => 'img/products/34-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 34,
                'product_name' => 'WILFRED',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78112,
                'detail' =>
                    'ビジネスシーンからカジュアルシーンにと幅広く使用できるセミブローグモデルのWILFRED(ウィルフレッド)。',
                'image' => 'img/products/35-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 35,
                'product_name' => 'CONSUL',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 91300,
                'detail' =>
                    'ビジネスを含む幅広いシーンで活躍してくれるストレートチップのCONSUL(コンサル)。',
                'image' => 'img/products/36-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 36,
                'product_name' => 'NIRAH2WOMEN',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 98600,
                'detail' => '
                            人気モデル KETSBY(ケツビー)のアッパー部分をプレーンに、そしてコバ部分にスタッズ(メット)をはめ込んだモデルです。',
                'image' => 'img/products/64-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 37,
                'product_name' => 'WILFRD',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 105000,
                'detail' => '
                            クラシカルな雰囲気に、人目を惹く斬新なデザインが、現代的でスタイリッシュな一足。英国紳士靴メーカーならではのトラッド&クラシカルな印象で、コーディネートの主役にも。パンツやスカート、ドレスに合わせても、上品さが漂うシューズです。',
                'image' => 'img/products/65-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 38,
                'product_name' => 'long tips',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 90000,
                'detail' => '
                            スッキリとしたフォルムでプレーンなこのシューズは、スカートからパンツスタイルまで合わせやすく、流行にされないので長くお履きいただけます。',
                'image' => 'img/products/66-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 39,
                'product_name' => '45491H',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 140000,
                'detail' => '1884年アメリカはマサチューセッツ州にて、Charles H.Alden氏によってスタートしたシューズメーカー【Alden】(オールデン)。
                            ',
                'image' => 'img/products/67-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 40,
                'product_name' => 'N9402',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 723400,
                'detail' => 'こちらの商品は手作業で製品を作り上げているため若干の色ムラ・しわ・大きさや
                            ハンドステッチ等の不均一感、シューレース穴位置の非対称等見受けられる場合がございます。
            ',
                'image' => 'img/products/68-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 41,
                'product_name' => 'AtlanticWorks',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 31900,
                'detail' => '定番のベネシャンモカシンに新色登場です。
                            高い技術でモカシンを作り続けている全米でも数少ないファクトリー、Atlantic Worksに製作を依頼したカラーレスベネシャンモカシン。',
                'image' => 'img/products/69-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 42,
                'product_name' => 'SHIRLEY 55 WOMEN',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 86900,
                'detail' => '
                            アッパーにはチャーチ定番のポリッシュ素材を使用。通常のカーフよりも光沢感が増しており、傷や汚れが付きにくく、お手入れもしやすい特徴があります。
                            ',
                'image' => 'img/products/70-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 43,
                'product_name' => 'PERLA',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 47700,
                'detail' =>
                    'アッパーのゴールドカラービットモチーフが上品な印象をプラスしてくれるトラッドスタイル定番のローファー。',
                'image' => 'img/products/71-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 44,
                'product_name' => 'DALIA WOMEN2',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 81600,
                'detail' => 'エッジに施されたスタッズがアクセントになったサンダルDALIA(ダリア)。
                            フロント2か所のワイドストラップと、バックストラップによりホールド感のある履き心地。',
                'image' => 'img/products/72-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 45,
                'product_name' => 'RHONDA WOMEN',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 81700,
                'detail' => 'エッジに施されたスタッズがアクセントになったクロスサンダルRHONDA(ロンダ)。
                            甲の上で大胆にクロスした太めのストラップと、シルバーのバッグルストラップが足元をクールに演出。 ',
                'image' => 'img/products/73-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 46,
                'product_name' => 'KELSEY WOMEN',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78,
                'detail' =>
                    '安定感のあるローヒールタイプ。洗練されたシルバートーンのバックルがアクセント。',
                'image' => 'img/products/74-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 47,
                'product_name' => 'NIRAH 2 WOMEN',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 170000,
                'detail' =>
                    '小振りなスタッズが大人の女性らしいエレガントさを放つサイドゴアブーツNIRAH 2(ニラ)。',
                'image' => 'img/products/75-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 48,
                'product_name' => 'LORA',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 50000,
                'detail' =>
                    'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーに、待望のウィメンズコレクション。',
                'image' => 'img/products/76-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 49,
                'product_name' => 'FILEY',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 69400,
                'detail' =>
                    'グットイヤー・ウェルト・シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーのウィメンズコレクション。',
                'image' => 'img/products/77-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 50,
                'product_name' => 'MAYER',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 57000,
                'detail' =>
                    'グッドイヤーウェルト製法によって作られ、履き込むことで自分の足に馴染み、フィット感が高まります。',
                'image' => 'img/products/78-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 51,
                'product_name' => 'MILY',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 85000,
                'detail' =>
                    'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーに、待望のウィメンズコレクション。',
                'image' => 'img/products/79-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 52,
                'product_name' => 'BONNIE',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 89000,
                'detail' => '
                            ジョセフチーニーのウィメンズシューズはメンズシューズ同様に、レザーのカッティングからファイナルポリッシュまでの全工程をノーザンプトンの自社工場で完結。',
                'image' => 'img/products/80-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 53,

                'product_name' => 'ORIBELLA(WHITE) WOMEN',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 50000,
                'detail' =>
                    'キルトタッセルが英国らしい雰囲気をかもしだすクラシックなORIBELLA(オリベラ)。',
                'image' => 'img/products/81-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 54,
                'product_name' => 'BONIE',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 56000,
                'detail' =>
                    'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーのウィメンズコレクション。',
                'image' => 'img/products/82-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 55,
                'product_name' => 'BONNI',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 56000,
                'detail' => 'トラッドスタイル定番のローファー。ジョセフチーニーのメンズコレクションでも定番のアイテムを女性らしいコンビカラーにアレンジしたBONNIE(ボニー)。
                            ',
                'image' => 'img/products/83-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 56,
                'product_name' => 'MILLY',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 85000,
                'detail' =>
                    'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーに、待望のウィメンズコレクション。',
                'image' => 'img/products/84-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 57,
                'product_name' => 'LANA WOMEN',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 50900,
                'detail' => 'ダブルモンクとウィングチップが目を惹くLANA(ラナ)。
                            どことなくメンズライクでトラッド感のある、いかにもチャーチらしい佇まいです。',
                'image' => 'img/products/85-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 58,
                'product_name' => 'KETSBY WOMEN ',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 69000,
                'detail' =>
                    'チャーチウィメンズの人気モデル、履いたり脱いだりしやすいサイドゴアタイプのウィングチップショートブーツKETSBY(ケツビー)。',
                'image' => 'img/products/86-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 59,
                'product_name' => 'ストレートチップ',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 30000,
                'detail' => 'オーセンティックなシルエットに拘ったハイクラスな革底ドレスシューズ。
                            艶感のあるインポートレザーを贅沢し使用し、足当たりの優しいソフトな鏡面加工レザーです。',
                'image' => 'img/products/87-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 60,
                'product_name' => 'サイドゴアブーツ',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 32000,
                'detail' => 'グッドイヤーウエルト式製法で作られるゴアテックス フットウェアのリーガルならではの高付加価値ブーツです。
                            少し厚めのアウトソール。重厚さとドレッシーな佇まいに拘りました。
                            王道ドレス顔の機能ブーツです。',
                'image' => 'img/products/88-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 61,
                'product_name' => 'プレーントウ',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 50000,
                'detail' => 'グッドイヤーウエルトの中物のコルクをクッション材のオーソライトに変更し、踏み込んだ時の沈み込む感覚が 新しい履き心地で、足なじみの早さもポイントのドレスシューズ。
                            つま先裏のトラスニットで優しい足当たりを実現、カカトのパッドや型押しライニングでスポーティー要素もプラス。
                            ビジネスシーンの中にコンフォタブル（快適）を提供する1足',
                'image' => 'img/products/89-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 62,
                'product_name' =>
                    'M5633 BOURTON / MARRON ANTIQUE (DAINITE SOLE)',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 60000,

                'detail' => '1829年創業のTricker’sは革靴の聖地である英国ノーサンプトンで最古のシューズファクトリーとして、現在でも当時と変わらぬ伝統の技法を守り続けています。
                            「質実剛健」と称されるそのものづくりは「ロイヤルワラント(英国王室御用達)」を授かるほどの職人技です。',
                'image' => 'img/products/90-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 63,
                'product_name' => 'M2754 HENRY / 1 BURNISHED',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 40000,
                'detail' => 'HENRYはサイドゴアのカントリーブーツ。
                            カントリーブーツやカントリーシューズは、かつて英国の上流階級がカントリーサイド（田舎）に狩りに出かけていくために考案されたのが始まりと言われています。',
                'image' => 'img/products/91-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 64,
                'product_name' => 'M6119 LAMBOURN / BLACK CALF (LEATHER SOLE)',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 001,
                'detail' => '
                            LAMBOURNはシンプルでエレガントなサイドゴアブーツ。
                            セミスクエアトゥのシルエットと装飾のないミニマルなデザインに気品が漂います。
                            ',
                'image' => 'img/products/92-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 65,
                'product_name' => 'SILVER SKULL',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 190000,
                'detail' =>
                    'そしてその「ロイヤルワラント」を授かるきっかけになったのが、このCHURCHILLというモデルであると言われています。',
                'image' => 'img/products/93-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 66,
                'product_name' => 'CHURCHILL
                            ',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 69000,
                'detail' => '
                            そしてその「ロイヤルワラント」を授かるきっかけになったのが、このCHURCHILLというモデルであると言われています。
                            CHURCHILLは、元々貴族や紳士達がルームシューズとして着用していたモデル。',
                'image' => 'img/products/94-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 67,
                'product_name' => 'L5679 ANNE ',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 50400,
                'detail' => '
                            ANNEはTrickerらしさを感じさせるカントリーシューズです。
                            カントリーブーツやカントリーシューズは、かつて英国の上流階級がカントリーサイド（田舎）に狩りに出かけていくために考案されたのが始まりと言われています。は季節を問わず履いていただけるアイテムです。',
                'image' => 'img/products/95-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 68,
                'product_name' => 'L5679 ANE',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 87900,
                'detail' => '
                            ウイングチップやメダリオンが英国らしい気品を感じさせるとともに、ラウンドトゥのシルエットやコバの張り出したソール周り、レースアップのディテールがワークテイストを演出します。
                            ',
                'image' => 'img/products/96-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 69,
                'product_name' => 'L2754 SILVIA (COMMANDO SOLE)',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 40000,
                'detail' =>
                    'すっきりした足首回りや着脱のしやすさはサイドゴアブーツならではです。',
                'image' => 'img/products/97-0.jpg',
                'stock' => 10,
            ],
            [
                'id' => 70,
                'product_name' => 'L7590 (DAINITE SOLE)',
                //'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78900,
                'detail' => 'こちらのモデルはシングルストラップのフルブローグシューズです。

                            ',
                'image' => 'img/products/99-0.jpg',
                'stock' => 10,
            ],
        ];

        DB::table('products')->insert($products);

        $images = [
            [
                'id' => 1,
                'product_id' => 1,
                'image' => 'img/products/64-1.jpg',
            ],
            [
                'id' => 2,
                'product_id' => 1,
                'image' => 'img/products/64-2.jpg',
            ],
            [
                'id' => 3,
                'product_id' => 1,
                'image' => 'img/products/64-3.jpg',
            ],
            [
                'id' => 4,
                'product_id' => 2,
                'image' => 'img/products/01-1.jpg',
            ],
            [
                'id' => 5,

                'product_id' => 2,
                'image' => 'img/products/01-2.jpg',
            ],
            [
                'id' => 6,
                'product_id' => 2,
                'image' => 'img/products/01-3.jpg',
            ],
            [
                'id' => 7,
                'product_id' => 2,
                'image' => 'img/products/01-4.jpg',
            ],
            [
                'id' => 8,
                'product_id' => 3,
                'image' => 'img/products/02-1.jpg',
            ],
            [
                'id' => 9,
                'product_id' => 3,
                'image' => 'img/products/02-2.jpg',
            ],
            [
                'id' => 10,
                'product_id' => 3,
                'image' => 'img/products/02-3.jpg',
            ],
            [
                'id' => 11,
                'product_id' => 3,
                'image' => 'img/products/02-4.jpg',
            ],
            [
                'id' => 12,
                'product_id' => 4,
                'image' => 'img/products/03-1.jpg',
            ],
            [
                'id' => 13,
                'product_id' => 4,
                'image' => 'img/products/03-2.jpg',
            ],
            [
                'id' => 14,
                'product_id' => 4,
                'image' => 'img/products/03-3.jpg',
            ],
            [
                'id' => 15,
                'product_id' => 5,
                'image' => 'img/products/04-1.jpg',
            ],
            [
                'id' => 16,
                'product_id' => 5,
                'image' => 'img/products/04-2.jpg',
            ],
            [
                'id' => 17,
                'product_id' => 5,
                'image' => 'img/products/04-3.jpg',
            ],
            [
                'id' => 18,
                'product_id' => 6,
                'image' => 'img/products/05-1.jpg',
            ],
            [
                'id' => 19,
                'product_id' => 6,
                'image' => 'img/products/05-2.jpg',
            ],
            [
                'id' => 20,
                'product_id' => 6,
                'image' => 'img/products/05-3.jpg',
            ],
            [
                'id' => 21,
                'product_id' => 7,
                'image' => 'img/products/06-1.jpg',
            ],
            [
                'id' => 22,
                'product_id' => 7,
                'image' => 'img/products/06-2.jpg',
            ],
            [
                'id' => 23,
                'product_id' => 7,
                'image' => 'img/products/06-3.jpg',
            ],
            [
                'id' => 24,
                'product_id' => 7,
                'image' => 'img/products/06-4.jpg',
            ],
            [
                'id' => 25,
                'product_id' => 7,
                'image' => 'img/products/06-5.jpg',
            ],
            [
                'id' => 26,
                'product_id' => 8,
                'image' => 'img/products/07-1.jpg',
            ],
            [
                'id' => 27,
                'product_id' => 8,
                'image' => 'img/products/07-2.jpg',
            ],
            [
                'id' => 28,
                'product_id' => 8,
                'image' => 'img/products/07-3.jpg',
            ],
            [
                'id' => 29,
                'product_id' => 9,
                'image' => 'img/products/08-1.jpg',
            ],
            [
                'id' => 30,
                'product_id' => 9,
                'image' => 'img/products/08-2.jpg',
            ],
            [
                'id' => 31,
                'product_id' => 9,
                'image' => 'img/products/08-3.jpg',
            ],

            [
                'id' => 32,
                'product_id' => 10,
                'image' => 'img/products/09-1.jpg',
            ],
            [
                'id' => 33,
                'product_id' => 10,
                'image' => 'img/products/09-2.jpg',
            ],
            [
                'id' => 34,
                'product_id' => 10,
                'image' => 'img/products/09-3.jpg',
            ],
            [
                'id' => 35,
                'product_id' => 10,
                'image' => 'img/products/09-4.jpg',
            ],
            [
                'id' => 36,
                'product_id' => 11,
                'image' => 'img/products/10-1.jpg',
            ],
            [
                'id' => 37,
                'product_id' => 11,
                'image' => 'img/products/10-2.jpg',
            ],
            [
                'id' => 38,
                'product_id' => 11,
                'image' => 'img/products/10-3.jpg',
            ],
            [
                'id' => 39,
                'product_id' => 11,
                'image' => 'img/products/10-4.jpg',
            ],

            [
                'id' => 40,
                'product_id' => 12,
                'image' => 'img/products/11-1.jpg',
            ],
            [
                'id' => 41,
                'product_id' => 12,
                'image' => 'img/products/11-2.jpg',
            ],
            [
                'id' => 42,
                'product_id' => 12,
                'image' => 'img/products/11-3.jpg',
            ],
            [
                'id' => 43,
                'product_id' => 12,
                'image' => 'img/products/11-4.jpg',
            ],
            [
                'id' => 44,
                'product_id' => 13,
                'image' => 'img/products/12-1.jpg',
            ],
            [
                'id' => 45,
                'product_id' => 13,
                'image' => 'img/products/12-2.jpg',
            ],
            [
                'id' => 46,
                'product_id' => 13,
                'image' => 'img/products/12-3.jpg',
            ],
            [
                'id' => 47,
                'product_id' => 13,
                'image' => 'img/products/12-4.jpg',
            ],
            [
                'id' => 48,
                'product_id' => 14,
                'image' => 'img/products/13-1.jpg',
            ],
            [
                'id' => 49,
                'product_id' => 14,
                'image' => 'img/products/13-2.jpg',
            ],
            [
                'id' => 50,
                'product_id' => 14,
                'image' => 'img/products/13-3.jpg',
            ],
            [
                'id' => 51,
                'product_id' => 14,
                'image' => 'img/products/13-4.jpg',
            ],

            [
                'id' => 52,
                'product_id' => 15,
                'image' => 'img/products/14-1.jpg',
            ],
            [
                'id' => 53,
                'product_id' => 15,
                'image' => 'img/products/14-2.jpg',
            ],
            [
                'id' => 54,
                'product_id' => 15,
                'image' => 'img/products/14-3.jpg',
            ],
            [
                'id' => 55,
                'product_id' => 16,
                'image' => 'img/products/15-1.jpg',
            ],
            [
                'id' => 56,
                'product_id' => 16,
                'image' => 'img/products/15-2.jpg',
            ],
            [
                'id' => 57,
                'product_id' => 16,
                'image' => 'img/products/15-3.jpg',
            ],
            [
                'id' => 58,
                'product_id' => 17,
                'image' => 'img/products/16-1.jpg',
            ],
            [
                'id' => 59,
                'product_id' => 17,
                'image' => 'img/products/16-2.jpg',
            ],
            [
                'id' => 60,
                'product_id' => 17,
                'image' => 'img/products/16-3.jpg',
            ],
            [
                'id' => 61,
                'product_id' => 17,
                'image' => 'img/products/16-4.jpg',
            ],

            [
                'id' => 62,
                'product_id' => 18,
                'image' => 'img/products/17-1.jpg',
            ],
            [
                'id' => 63,
                'product_id' => 18,
                'image' => 'img/products/17-2.jpg',
            ],
            [
                'id' => 64,
                'product_id' => 18,
                'image' => 'img/products/17-3.jpg',
            ],
            [
                'id' => 65,
                'product_id' => 18,
                'image' => 'img/products/17-4.jpg',
            ],
            [
                'id' => 66,
                'product_id' => 18,
                'image' => 'img/products/17-5.jpg',
            ],
            [
                'id' => 67,
                'product_id' => 19,
                'image' => 'img/products/18-1.jpg',
            ],
            [
                'id' => 68,
                'product_id' => 19,
                'image' => 'img/products/18-2.jpg',
            ],
            [
                'id' => 69,
                'product_id' => 19,
                'image' => 'img/products/18-3.jpg',
            ],
            [
                'id' => 70,
                'product_id' => 19,
                'image' => 'img/products/18-4.jpg',
            ],
            [
                'id' => 71,
                'product_id' => 20,
                'image' => 'img/products/19-1.jpg',
            ],
            [
                'id' => 72,
                'product_id' => 20,
                'image' => 'img/products/19-2.jpg',
            ],
            [
                'id' => 73,
                'product_id' => 20,
                'image' => 'img/products/19-3.jpg',
            ],
            [
                'id' => 74,
                'product_id' => 21,
                'image' => 'img/products/20-1.jpg',
            ],
            [
                'id' => 75,
                'product_id' => 21,
                'image' => 'img/products/20-2.jpg',
            ],
            [
                'id' => 76,
                'product_id' => 21,
                'image' => 'img/products/20-3.jpg',
            ],
            [
                'id' => 77,
                'product_id' => 22,
                'image' => 'img/products/21-1.jpg',
            ],
            [
                'id' => 78,
                'product_id' => 22,
                'image' => 'img/products/21-2.jpg',
            ],
            [
                'id' => 79,
                'product_id' => 22,
                'image' => 'img/products/21-3.jpg',
            ],
            [
                'id' => 80,
                'product_id' => 23,
                'image' => 'img/products/22-1.jpg',
            ],
            [
                'id' => 81,
                'product_id' => 23,
                'image' => 'img/products/22-2.jpg',
            ],
            [
                'id' => 82,
                'product_id' => 23,
                'image' => 'img/products/22-3.jpg',
            ],
            [
                'id' => 83,
                'product_id' => 24,
                'image' => 'img/products/23-1.jpg',
            ],
            [
                'id' => 84,
                'product_id' => 24,
                'image' => 'img/products/23-2.jpg',
            ],
            [
                'id' => 85,
                'product_id' => 24,
                'image' => 'img/products/23-3.jpg',
            ],
            [
                'id' => 86,
                'product_id' => 25,
                'image' => 'img/products/24-1.jpg',
            ],
            [
                'id' => 87,
                'product_id' => 25,
                'image' => 'img/products/24-2.jpg',
            ],
            [
                'id' => 88,
                'product_id' => 25,
                'image' => 'img/products/24-3.jpg',
            ],
            [
                'id' => 89,
                'product_id' => 26,
                'image' => 'img/products/25-1.jpg',
            ],
            [
                'id' => 90,
                'product_id' => 26,
                'image' => 'img/products/25-2.jpg',
            ],
            [
                'id' => 91,
                'product_id' => 27,
                'image' => 'img/products/26-1.jpg',
            ],
            [
                'id' => 92,
                'product_id' => 27,
                'image' => 'img/products/26-2.jpg',
            ],
            [
                'id' => 93,
                'product_id' => 27,
                'image' => 'img/products/26-3.jpg',
            ],
            [
                'id' => 94,
                'product_id' => 28,
                'image' => 'img/products/27-1.jpg',
            ],
            [
                'id' => 95,
                'product_id' => 28,
                'image' => 'img/products/27-2.jpg',
            ],
            [
                'id' => 96,
                'product_id' => 28,
                'image' => 'img/products/27-3.jpg',
            ],
            [
                'id' => 97,
                'product_id' => 29,
                'image' => 'img/products/28-1.jpg',
            ],
            [
                'id' => 98,
                'product_id' => 29,
                'image' => 'img/products/28-2.jpg',
            ],
            [
                'id' => 99,
                'product_id' => 29,
                'image' => 'img/products/28-3.jpg',
            ],
            [
                'id' => 100,
                'product_id' => 30,
                'image' => 'img/products/30-1.jpg',
            ],
            [
                'id' => 101,
                'product_id' => 30,
                'image' => 'img/products/30-2.jpg',
            ],
            [
                'id' => 102,
                'product_id' => 30,
                'image' => 'img/products/30-3.jpg',
            ],
            [
                'id' => 103,
                'product_id' => 30,
                'image' => 'img/products/30-4.jpg',
            ],
            [
                'id' => 104,
                'product_id' => 31,
                'image' => 'img/products/31-1.jpg',
            ],
            [
                'id' => 105,
                'product_id' => 31,
                'image' => 'img/products/31-2.jpg',
            ],
            [
                'id' => 106,
                'product_id' => 31,
                'image' => 'img/products/31-3.jpg',
            ],
            [
                'id' => 107,
                'product_id' => 31,
                'image' => 'img/products/31-4.jpg',
            ],
            [
                'id' => 108,
                'product_id' => 32,
                'image' => 'img/products/32-1.jpg',
            ],
            [
                'id' => 109,
                'product_id' => 32,
                'image' => 'img/products/32-2.jpg',
            ],
            [
                'id' => 110,
                'product_id' => 32,
                'image' => 'img/products/32-3.jpg',
            ],
            [
                'id' => 111,

                'product_id' => 33,
                'image' => 'img/products/34-1.jpg',
            ],
            [
                'id' => 112,
                'product_id' => 33,
                'image' => 'img/products/34-3.jpg',
            ],
            [
                'id' => 113,
                'product_id' => 33,
                'image' => 'img/products/34-4.jpg',
            ],
            [
                'id' => 114,
                'product_id' => 33,
                'image' => 'img/products/34-5.jpg',
            ],
            [
                'id' => 115,
                'product_id' => 34,
                'image' => 'img/products/35-1.jpg',
            ],
            [
                'id' => 116,
                'product_id' => 34,
                'image' => 'img/products/35-2.jpg',
            ],
            [
                'id' => 117,
                'product_id' => 34,
                'image' => 'img/products/35-3.jpg',
            ],
            [
                'id' => 118,
                'product_id' => 35,
                'image' => 'img/products/36-1.jpg',
            ],
            [
                'id' => 119,
                'product_id' => 35,
                'image' => 'img/products/36-2.jpg',
            ],
            [
                'id' => 120,
                'product_id' => 35,
                'image' => 'img/products/36-3.jpg',
            ],
            [
                'id' => 121,
                'product_id' => 36,
                'image' => 'img/products/64-1.jpg',
            ],
            [
                'id' => 122,
                'product_id' => 36,
                'image' => 'img/products/64-2.jpg',
            ],
            [
                'id' => 123,
                'product_id' => 36,
                'image' => 'img/products/64-3.jpg',
            ],
            [
                'id' => 124,
                'product_id' => 37,
                'image' => 'img/products/65-1.jpg',
            ],
            [
                'id' => 125,
                'product_id' => 37,
                'image' => 'img/products/65-2.jpg',
            ],
            [
                'id' => 126,
                'product_id' => 37,
                'image' => 'img/products/65-3.jpg',
            ],
            [
                'id' => 127,
                'product_id' => 37,
                'image' => 'img/products/65-4.jpg',
            ],
            [
                'id' => 128,
                'product_id' => 38,
                'image' => 'img/products/66-1.jpg',
            ],
            [
                'id' => 129,
                'product_id' => 38,
                'image' => 'img/products/66-2.jpg',
            ],
            [
                'id' => 130,
                'product_id' => 38,
                'image' => 'img/products/66-3.jpg',
            ],
            [
                'id' => 131,
                'product_id' => 38,
                'image' => 'img/products/66-4.jpg',
            ],
            [
                'id' => 132,
                'product_id' => 39,
                'image' => 'img/products/67-1.jpg',
            ],
            [
                'id' => 133,
                'product_id' => 39,
                'image' => 'img/products/67-2.jpg',
            ],
            [
                'id' => 134,
                'product_id' => 39,
                'image' => 'img/products/67-3.jpg',
            ],
            [
                'id' => 135,
                'product_id' => 40,
                'image' => 'img/products/68-1.jpg',
            ],
            [
                'id' => 136,
                'product_id' => 40,
                'image' => 'img/products/68-2.jpg',
            ],
            [
                'id' => 137,
                'product_id' => 40,
                'image' => 'img/products/68-3.jpg',
            ],
            [
                'id' => 138,
                'product_id' => 41,
                'image' => 'img/products/69-1.jpg',
            ],
            [
                'id' => 139,
                'product_id' => 41,
                'image' => 'img/products/69-2.jpg',
            ],
            [
                'id' => 140,
                'product_id' => 41,
                'image' => 'img/products/69-3.jpg',
            ],
            [
                'id' => 141,
                'product_id' => 41,
                'image' => 'img/products/69-4.jpg',
            ],
            [
                'id' => 142,
                'product_id' => 42,
                'image' => 'img/products/70-1.jpg',
            ],
            [
                'id' => 143,
                'product_id' => 42,
                'image' => 'img/products/70-2.jpg',
            ],
            [
                'id' => 144,
                'product_id' => 42,
                'image' => 'img/products/70-3.jpg',
            ],
            [
                'id' => 145,
                'product_id' => 43,
                'image' => 'img/products/71-1.jpg',
            ],
            [
                'id' => 146,
                'product_id' => 43,
                'image' => 'img/products/71-2.jpg',
            ],
            [
                'id' => 147,
                'product_id' => 43,
                'image' => 'img/products/71-3.jpg',
            ],
            [
                'id' => 148,
                'product_id' => 44,
                'image' => 'img/products/72-1.jpg',
            ],
            [
                'id' => 149,
                'product_id' => 44,
                'image' => 'img/products/72-2.jpg',
            ],
            [
                'id' => 150,
                'product_id' => 44,
                'image' => 'img/products/72-3.jpg',
            ],
            [
                'id' => 151,
                'product_id' => 44,
                'image' => 'img/products/72-4.jpg',
            ],
            [
                'id' => 152,
                'product_id' => 45,
                'image' => 'img/products/73-1.jpg',
            ],
            [
                'id' => 153,
                'product_id' => 45,
                'image' => 'img/products/73-2.jpg',
            ],
            [
                'id' => 154,
                'product_id' => 45,
                'image' => 'img/products/73-3.jpg',
            ],
            [
                'id' => 155,
                'product_id' => 45,
                'image' => 'img/products/73-4.jpg',
            ],
            [
                'id' => 156,
                'product_id' => 46,
                'image' => 'img/products/74-1.jpg',
            ],
            [
                'id' => 157,
                'product_id' => 46,
                'image' => 'img/products/74-2.jpg',
            ],
            [
                'id' => 158,
                'product_id' => 46,
                'image' => 'img/products/74-3.jpg',
            ],
            [
                'id' => 159,
                'product_id' => 47,
                'image' => 'img/products/75-1.jpg',
            ],
            [
                'id' => 160,
                'product_id' => 47,
                'image' => 'img/products/75-2.jpg',
            ],
            [
                'id' => 161,
                'product_id' => 47,
                'image' => 'img/products/75-3.jpg',
            ],
            [
                'id' => 162,
                'product_id' => 48,
                'image' => 'img/products/76-1.jpg',
            ],
            [
                'id' => 163,
                'product_id' => 48,
                'image' => 'img/products/76-2.jpg',
            ],
            [
                'id' => 164,
                'product_id' => 48,
                'image' => 'img/products/76-3.jpg',
            ],
            [
                'id' => 165,

                'product_id' => 49,
                'image' => 'img/products/77-1.jpg',
            ],
            [
                'id' => 166,
                'product_id' => 49,
                'image' => 'img/products/77-2.jpg',
            ],
            [
                'id' => 167,
                'product_id' => 49,
                'image' => 'img/products/77-3.jpg',
            ],
            [
                'id' => 168,
                'product_id' => 50,
                'image' => 'img/products/78-1.jpg',
            ],
            [
                'id' => 169,
                'product_id' => 50,
                'image' => 'img/products/78-2.jpg',
            ],
            [
                'id' => 170,
                'product_id' => 50,
                'image' => 'img/products/78-3.jpg',
            ],
            [
                'id' => 171,
                'product_id' => 51,
                'image' => 'img/products/79-1.jpg',
            ],
            [
                'id' => 172,
                'product_id' => 51,
                'image' => 'img/products/79-2.jpg',
            ],
            [
                'id' => 173,
                'product_id' => 51,
                'image' => 'img/products/79-3.jpg',
            ],
            [
                'id' => 174,
                'product_id' => 52,
                'image' => 'img/products/80-1.jpg',
            ],
            [
                'id' => 175,
                'product_id' => 52,
                'image' => 'img/products/80-2.jpg',
            ],
            [
                'id' => 176,
                'product_id' => 52,
                'image' => 'img/products/80-3.jpg',
            ],
            [
                'id' => 177,
                'product_id' => 52,
                'image' => 'img/products/80-4.jpg',
            ],
            [
                'id' => 178,
                'product_id' => 53,
                'image' => 'img/products/81-1.jpg',
            ],
            [
                'id' => 179,
                'product_id' => 53,
                'image' => 'img/products/81-2.jpg',
            ],
            [
                'id' => 180,
                'product_id' => 53,
                'image' => 'img/products/81-3.jpg',
            ],
            [
                'id' => 181,

                'product_id' => 53,
                'image' => 'img/products/81-4.jpg',
            ],
            [
                'id' => 182,
                'product_id' => 54,
                'image' => 'img/products/82-1.jpg',
            ],
            [
                'id' => 183,
                'product_id' => 54,
                'image' => 'img/products/82-2.jpg',
            ],
            [
                'id' => 184,
                'product_id' => 54,
                'image' => 'img/products/82-3.jpg',
            ],
            [
                'id' => 185,
                'product_id' => 54,
                'image' => 'img/products/82-4.jpg',
            ],
            [
                'id' => 186,
                'product_id' => 55,
                'image' => 'img/products/83-1.jpg',
            ],
            [
                'id' => 187,
                'product_id' => 55,
                'image' => 'img/products/83-2.jpg',
            ],
            [
                'id' => 188,
                'product_id' => 55,
                'image' => 'img/products/83-3.jpg',
            ],
            [
                'id' => 189,
                'product_id' => 55,
                'image' => 'img/products/83-4.jpg',
            ],
            [
                'id' => 190,
                'product_id' => 56,
                'image' => 'img/products/84-1.jpg',
            ],
            [
                'id' => 191,
                'product_id' => 56,
                'image' => 'img/products/84-2.jpg',
            ],
            [
                'id' => 192,
                'product_id' => 56,
                'image' => 'img/products/84-3.jpg',
            ],
            [
                'id' => 193,
                'product_id' => 56,
                'image' => 'img/products/84-4.jpg',
            ],
            [
                'id' => 194,
                'product_id' => 57,
                'image' => 'img/products/85-1.jpg',
            ],
            [
                'id' => 195,
                'product_id' => 57,
                'image' => 'img/products/85-2.jpg',
            ],
            [
                'id' => 196,
                'product_id' => 57,
                'image' => 'img/products/85-3.jpg',
            ],
            [
                'id' => 197,
                'product_id' => 57,
                'image' => 'img/products/85-4.jpg',
            ],
            [
                'id' => 198,
                'product_id' => 58,
                'image' => 'img/products/86-1.jpg',
            ],
            [
                'id' => 199,
                'product_id' => 58,
                'image' => 'img/products/86-2.jpg',
            ],
            [
                'id' => 200,
                'product_id' => 58,
                'image' => 'img/products/86-4.jpg',
            ],
            [
                'id' => 201,
                'product_id' => 59,
                'image' => 'img/products/87-1.jpg',
            ],
            [
                'id' => 202,
                'product_id' => 59,
                'image' => 'img/products/87-2.jpg',
            ],
            [
                'id' => 203,
                'product_id' => 59,
                'image' => 'img/products/87-3.jpg',
            ],
            [
                'id' => 204,
                'product_id' => 59,
                'image' => 'img/products/87-5.jpg',
            ],
            [
                'id' => 205,
                'product_id' => 60,
                'image' => 'img/products/88-1.jpg',
            ],
            [
                'id' => 206,
                'product_id' => 60,
                'image' => 'img/products/88-2.jpg',
            ],
            [
                'id' => 207,
                'product_id' => 60,
                'image' => 'img/products/88-3.jpg',
            ],
            [
                'id' => 208,
                'product_id' => 60,
                'image' => 'img/products/88-4.jpg',
            ],
            [
                'id' => 209,
                'product_id' => 60,
                'image' => 'img/products/88-5.jpg',
            ],
            [
                'id' => 210,
                'product_id' => 61,
                'image' => 'img/products/89-1.jpg',
            ],
            [
                'id' => 211,
                'product_id' => 61,
                'image' => 'img/products/89-2.jpg',
            ],
            [
                'id' => 212,
                'product_id' => 61,
                'image' => 'img/products/89-3.jpg',
            ],
            [
                'id' => 213,
                'product_id' => 61,
                'image' => 'img/products/89-4.jpg',
            ],
            [
                'id' => 214,
                'product_id' => 61,
                'image' => 'img/products/89-5.jpg',
            ],
            [
                'id' => 215,
                'product_id' => 62,
                'image' => 'img/products/90-1.jpg',
            ],
            [
                'id' => 216,
                'product_id' => 62,
                'image' => 'img/products/90-2.jpg',
            ],
            [
                'id' => 217,
                'product_id' => 62,
                'image' => 'img/products/90-3.jpg',
            ],
            [
                'id' => 218,
                'product_id' => 62,
                'image' => 'img/products/90-4.jpg',
            ],
            [
                'id' => 219,
                'product_id' => 63,
                'image' => 'img/products/91-1.jpg',
            ],
            [
                'id' => 220,
                'product_id' => 63,
                'image' => 'img/products/91-2.jpg',
            ],
            [
                'id' => 221,
                'product_id' => 63,
                'image' => 'img/products/91-3.jpg',
            ],
            [
                'id' => 222,
                'product_id' => 64,
                'image' => 'img/products/92-1.jpg',
            ],
            [
                'id' => 223,
                'product_id' => 64,
                'image' => 'img/products/92-2.jpg',
            ],
            [
                'id' => 224,
                'product_id' => 64,
                'image' => 'img/products/92-3.jpg',
            ],
            [
                'id' => 225,
                'product_id' => 65,
                'image' => 'img/products/93-1.jpg',
            ],
            [
                'id' => 226,
                'product_id' => 65,
                'image' => 'img/products/93-2.jpg',
            ],
            [
                'id' => 227,
                'product_id' => 65,
                'image' => 'img/products/93-3.jpg',
            ],
            [
                'id' => 228,
                'product_id' => 66,
                'image' => 'img/products/94-1.jpg',
            ],
            [
                'id' => 229,
                'product_id' => 66,
                'image' => 'img/products/94-2.jpg',
            ],
            [
                'id' => 230,
                'product_id' => 66,
                'image' => 'img/products/94-3.jpg',
            ],
            [
                'id' => 231,
                'product_id' => 67,
                'image' => 'img/products/95-1.jpg',
            ],
            [
                'id' => 232,
                'product_id' => 67,
                'image' => 'img/products/95-2.jpg',
            ],
            [
                'id' => 233,
                'product_id' => 67,
                'image' => 'img/products/95-3.jpg',
            ],
            [
                'id' => 234,
                'product_id' => 68,
                'image' => 'img/products/96-1.jpg',
            ],
            [
                'id' => 235,
                'product_id' => 68,
                'image' => 'img/products/96-2.jpg',
            ],
            [
                'id' => 236,
                'product_id' => 68,
                'image' => 'img/products/96-3.jpg',
            ],
            [
                'id' => 237,
                'product_id' => 68,
                'image' => 'img/products/96-4.jpg',
            ],
            [
                'id' => 238,
                'product_id' => 69,
                'image' => 'img/products/97-1.jpg',
            ],
            [
                'id' => 239,
                'product_id' => 69,
                'image' => 'img/products/97-2.jpg',
            ],
            [
                'id' => 240,
                'product_id' => 70,
                'image' => 'img/products/99-1.jpg',
            ],
            [
                'id' => 241,
                'product_id' => 70,
                'image' => 'img/products/99-2.jpg',
            ],
            [
                'id' => 242,
                'product_id' => 70,
                'image' => 'img/products/99-3.jpg',
            ],
        ];

        DB::table('images')->insert($images);

        for ($p = 1; $p <= 70; $p++) {
            for ($i = 1; $i <= 8; $i++) {
                $product_size = [
                    [
                        'product_id' => $p,
                        'size_id' => $i,
                    ],
                ];
                DB::table('product_sizes')->insert($product_size);
            }
        }
        $users = Users::factory()->create([
            'email' => 'test@example.com',
        ]);
    }
}
