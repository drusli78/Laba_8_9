<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use http\QueryString;
use Symfony\Component\Uid\Uuid;

class AppFixtures extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
            $user = new User();
            $blog = new Blog();
            $blog -> setBlogName('Физика частиц и новейшие технологии: что нас ждет в ближайшие 10 лет?');
            $user -> setUsername('timouri');
            $user -> setApiToken(Uuid::v1()->toRfc4122());
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                'VwZEbFzs'
            );
            $user -> setPassword($hashedPassword);
            $user -> setPhone('7(89)590-11-76');
            $user -> setEmail('brenna90@yahoo.com');
            $user -> setRoles(['ROLE_ADMIN']);
            $user -> setBlog($blog);
            $manager->persist($user);
            $manager->flush();
            $manager->persist($blog);
            $manager->flush();

            $post = new Post();
            $post -> setPostName('Физика частиц и новейшие технологии');
            $post -> setPostText('Итак, в отличие от классической физики, которая опирается на гравитацию и законы движения Ньютона, квантовые частицы действуют по своим собственным правилам. Например, такое понятие как суперпозиция указывает на способность квантовой системы находиться в нескольких состояниях одновременно.
            
И хотя звучит немного безумно и напоминает мысленный эксперимент кота Шредингера, частица действительно может находиться в нескольких состояниях сразу, но лишь до того момента, пока ее не измерят. Следующий принцип называется квантовой запутанностью.
Наблюдать ее можно когда два атома связаны между собой, несмотря на то, что их разделяет огромное расстояние. Если свойства одного из атомов изменяются, его запутанный аналог тоже меняется, причем мгновенно. Запутанность присутствует даже тогда, когда атомы расположены на противоположных концах Вселенной.

Суперпозиция и запутанность являются основополагающими принципами квантовой теории. Эти квантовые системы нашли свое повседневное применение, и ученые, наконец, учатся управлять ими и использовать в собственных интересах.');
            $post -> setAnnotation('Что нас ждет в ближайшие 10 лет?');
            $post -> setDataAdd(new \DateTime('now'));
            $post -> setViewQuantity(rand(0,1000));
            $post -> setPostStatus(true);
            $post -> setBlog($blog);
            $post -> setImagePost('https://hi-news.ru/wp-content/uploads/2022/02/qua_tech-750x459.jpeg');
            $manager->persist($post);
            $manager->flush();

            $comment = new Comment();
            $comment -> setCommentText('Очень интересная статья)))))');
            $comment -> setDataAddComment(new \DateTime('now'));
            $comment -> setCommentStatus(false);
            $comment -> setPost($post);
            $comment -> setUser($user);
            $manager->persist($comment);
            $manager->flush();

            $user = new User();
            $blog = new Blog();
            $blog -> setBlogName('«Мираторг» теперь в ЖЖ!');
            $user -> setUsername('Adofyn');
            $user -> setApiToken(Uuid::v1()->toRfc4122());
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                'pkdlKGpD'
            );
            $user -> setPassword($hashedPassword);
            $user -> setPhone('7(44)283-20-23');
            $user -> setEmail('ortiz.jerad@hotmail.com');
            $user -> setRoles(['ROLE_USER']);
            $user -> setBlog($blog);
            $manager->persist($user);
            $manager->flush();
            $manager->persist($blog);
            $manager->flush();

            $post = new Post();
            $post -> setPostName('Самый известный в мире стейк');
            $post -> setPostText('Рибай — мировой хит, ставший классикой, который подаётся в ресторанах и стейкхаусах на всех континентах. Не унимаются споры о его названии.
            
По одной из версий «рибай» – это сочетание английских слов rib «ребро» и eye «глаз», где, в данном случае «глазом» именуется центр лучшей вырезки без кости, из которой вырезается отруб. По другой, стейк получил название из-за овального «глазка» жира примерно посередине.

В разных странах его называют по-разному. Но как бы он ни назывался, неизменно остаётся одно: рибай – это ароматный и нежный стейк из мраморной говядины со сладким легкоплавким жиром, при жарке, образующим карамельную корочку.');
            $post -> setAnnotation('Рибай — мировой хит, ставший классикой, который подаётся в ресторанах и стейкхаусах на всех континентах.');
            $post -> setDataAdd(new \DateTime('now'));
            $post -> setViewQuantity(rand(0,1000));
            $post -> setPostStatus(true);
            $post -> setBlog($blog);
            $post -> setImagePost('https://ic.pics.livejournal.com/miratorg/90640311/11256/11256_800.jpg');
            $manager->persist($post);
            $manager->flush();

            $comment = new Comment();
            $comment -> setCommentText('Рекомендую данного блогера!!!');
            $comment -> setDataAddComment(new \DateTime('now'));
            $comment -> setCommentStatus(false);
            $comment -> setPost($post);
            $comment -> setUser($user);
            $manager->persist($comment);
            $manager->flush();


            $user = new User();
            $blog = new Blog();
            $blog -> setBlogName('И вышел под дождь!');
            $user -> setUsername('trac');
            $user -> setApiToken(Uuid::v1()->toRfc4122());
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                'e81vrB2Zd'
            );
            $user -> setPassword($hashedPassword);
            $user -> setPhone('7(19)369-50-32');
            $user -> setEmail('miguel.mcglynn@gmail.com');
            $user -> setRoles(['ROLE_USER']);
            $user -> setBlog($blog);
            $manager->persist($user);
            $manager->flush();
            $manager->persist($blog);
            $manager->flush();

            $post = new Post();
            $post -> setPostName('О скитаниях вечных и о свекле');
            $post -> setPostText('Все началось с двух случайно обнаруженных в холодильнике свеколок и приступа хозяйственности, - ая-яй, что ж пропадает добро. А не забубенить ли мне селедку под шубой. Тем более, что для нее есть все, кроме лука, яиц, майонеза, картошки, самой селедки и того, кто умел бы делать этот салат.
    Часам эдак к четырем утра, когда все было готово, вместо желания есть образовались груды отходов, красных пятен и безадресная претензия: например Высоцкий в мои годы уже никогда не стал Есениным, а я. Чем тут занимаюсь я?
    
    Вот мой дедушка (кстати, невероятный мастер во все свои громадные ручищи) никогда не готовил.
    Нет, возможно, он умел. Ну, примерно, как я умею левитировать. То есть, если спрыгнуть с сорок восьмого этажа, за пару метров от земли, вдруг да обнаружится, – Умею! Лечу!
    Но с чего бы мне вообще задумываться об этом, а тем более – так рисковать.
    В те редкие моменты, когда бабушка надолго оставляла дом, дед ловил нас с братом. Тщательно пересчитывал – все ли руки, ноги и головы на месте – не стыдно ли вывести в люди. И мы шли есть либо в гости, либо в ресторан, где директорствовал, а в момент наших приходов и кашеварил его старый товарищ.
    
    С отцом было иначе. Папа мой, будучи человеком служивым, еду не готовил. Но периодически подвергал термической обработке продукты питания, на предмет обеспечения жизнедеятельности вверенной ему семьи. Есть это было еще сложнее, чем выговорить. Нет, не то, чтоб совсем несъедобно. Скорее, безвкусно. Словно ешь не блюдо, а его рецепт.
    После еды следовало соврать – спасибо, было очень вкусно. Выдержать его смущенное бормотание, мол, да ладно, чего там. Лишь бы на здоровье.
    Потом, уже без него, стало понятно, что и неуклюжие блюда эти и будто фальшивые похвалы, все это было вообще совсем не про еду.
    Про любовь. Неловкую, но самую настоящую любовь.
    
    Отец рассказывал, что ему рассказывал его отец: прадед мой был поваром от бога. Но только в случае полного отсутствия продуктов и прочих условий для готовки, навроде посуды и печек.
    Вот где-нибудь в чистом поле, когда под рукой нет ни крошки съестного, изловить какого-нибудь суслика, птицу или крота, а потом запечь их в глине или завялить на жарком степном солнце, да так, что пальчики оближешь даже будучи сытым – такое он умел и мог. Такова была его жизнь, где лет с пяти и почти до самой смерти в сорок с небольшим, он практически не знал дома. Оно и понятно, было и такое неумолимое революционное счастье. Как там пелось в песне, - так за веком век - ни кола, ни двора: от сумы - тюрьма, на стыке эпох.
    
    Я же умею готовить практически все, кроме выпечки. Ну, как все – базовый минимум совковой рецептуры. Почему так получилось – не знаю. Возможно, иногда у меня случались избытки свободного времени и надо было чем-то себя занять, а бухать уже не было сил.
    Или потому, что все вокруг вдруг стали охочи до современной еды. Ну вот эти всякие обмотанные изолентой комки риса, которые суши. Склизкие до рвоты морские гады. Вонючие странные травы. Жутко полезные хлеба с тмином, кинзой, зернами нечищенного кокоса и цезием в полураспаде.
    А мы с моим организмом - жуткие неофобы и ретрограды. Нам подавай лишь то, после чего мы сумели выжить, а другого нам уже, пожалуйста, подавать не надо.
    
    Странно получилось, что во всех этих историях вроде как не нашлось слова о наших женщинах.
    Чувствую – надо исправить.
    Был тут как-то на малой родине, где меня познакомили с племянницей.
    Ну и с ее мужем заодно.
    Пока формировалось застолье, сестры запрягли меня к готовке. Почистить там. Порезать. Пойти куда подальше и вообще не мешать.
    - Вон как твой дядя ловко управляется, - сказал муж, сидящей без дела на кухне, племяннице. – А ты – так и не научилась готовить.
    Я замялся: адресовано не мне, но как дать в обиду, хоть и незнакомую, а родственницу? А если не давать, то как, когда не просили лезть в чужие семейные дела?
    - Я готовить научилась, - невозмутимо ответила племянница. – Теперь это твоя проблема: учись это есть.
    И тут я понял: вмешиваться – не надо. Она – не пропадет.
    А что еще может быть нужно, кроме того, чтоб они не пропали. О чем тут говорить.');
            $post -> setAnnotation('Все началось с двух случайно обнаруженных в холодильнике свеколок и приступа хозяйственности, - ая-яй, что ж пропадает добро. А не забубенить ли мне селедку под шубой.');
            $post -> setDataAdd(new \DateTime('now'));
            $post -> setViewQuantity(rand(0,1000));
            $post -> setPostStatus(false);
            $post -> setBlog($blog);
            $post -> setImagePost('https://lh3.googleusercontent.com/pw/AM-JKLWau5fRqSsNS3uLL1C8iInH3iOhNuSFxv9qemjCW2GX2HFOD91HFP7Ke08DjDIWnot1HVydR7mL0Eyc4Y00Xxr5MO9jmJ5iMMtsMMa1O0HPd6kvnoV_tPPycWW-mfRoQLQlvd-i5gpXD_WLs5F0TSpuyA=w1252-h938-no?authuser=0');
            $manager->persist($post);
            $manager->flush();

            $comment = new Comment();
            $comment -> setCommentText('Ох уж эта мне готовка — удивительное действие, приводящее к неожиданным и неочевидным результатам!');
            $comment -> setDataAddComment(new \DateTime('now'));
            $comment -> setCommentStatus(true);
            $comment -> setPost($post);
            $comment -> setUser($user);
            $manager->persist($comment);
            $manager->flush();


            $user = new User();
            $blog = new Blog();
            $blog -> setBlogName('Добро пожаловать на наш канал SMAPSE: образование и наука!');
            $user -> setUsername('Cheburashka');
            $user -> setApiToken(Uuid::v1()->toRfc4122());
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                '7p4%TQ)pn8'
            );
            $user -> setPassword($hashedPassword);
            $user -> setPhone('7(31)523-71-49');
            $user -> setEmail('parker.ellis@gmail.com');
            $user -> setRoles(['ROLE_USER']);
            $user -> setBlog($blog);
            $manager->persist($user);
            $manager->flush();
            $manager->persist($blog);
            $manager->flush();

            $post = new Post();
            $post -> setPostName('ТОП-5 самых богатых видеоблогеров');
            $post -> setPostText('Сегодня благодаря Сети стать популярным и сделать состояние стало намного легче. Самые популярные блогеры на YouTube сильно влияют на наши интересы и вкусы, могут создавать новые тренды, свою одежду и косметику, крутить рекламу и многое другое. Все это благодаря самой популярной площадке в мире!
            
    В журнале Forbes опубликован рейтинг самых богатых звезд ютуба в мире за 2019 год. ТОП-5 видеоблогеров «наснимали» больше чем на $98 млн. При этом некоторые участники рейтинга еще совсем дети, младше 10 лет.
    Джеффри Стар
    Певец и автор песен, предприниматель, диджей и блогер, модель, дизайнер, визажист – все это о Джеффри Стар Это. За звездой следят 17 млн. людей по всему миру. Его образ – это вызывающий мейкап, яркий маникюр, накладные ресницы, платья и высокие каблуки. Сегодня ютуб для него не только площадка для продвижения косметической линии, но источник высокого заработка.
    Ретт и Линк
    Комики перевели свое творчество на YouTube, где сегодня больше 15,9 млн подписчиков. Интересные шутки набирали популярность, а масштабную известность получили благодаря шоу Good Mythical Morning. На своем канале Ретт Маклафлин и Линк Нил пробуют сомнительные на вкус блюда, соперничают со звездами и экспериментируют над всем, что попадется под руку. Например, создали пицца-мобиль из настоящей пиццы, делали бутерброды на дне, распаковывали подарки всеми частями тела, кроме рук, катапультировали сосиску в булочку для хот-догов и многое другое.
    Анастасия Радзинская
    Сегодня детский канал на ютубе не уступает каналам взрослых. Пример этому – 5-летняя Анастасия Радзинская из Краснодарского края. Канал Like Nastya собрал 42,7 млн человек. Контент канала заинтересовывает благодаря милым рутинным делам: девочка развлекается в парке аттракционов вместе с папой, собирается в школу, празднует Новый Год.
    Команда Dude Perfect
    Техасские спортсмены получили популярность на YouTube благодаря невероятным трюкам и новым рекордам Гиннесса. В своих роликах они используют практически все: от шариков для пинг-понга, мячей и клюшек для гольфа до плюшевых панд и знаменитостей. В их роликах принимают участие селебрити, например, Серена Уильямс, актер Пол Радд, хоккеисты и баскетболисты. Сегодня на YouTube их ролики смотрят более чем 47,7 млн подписчиков.
    Райан Каджи
    Первое место с самой высокой прибылью занял Райан Каджи, которому недавно исполнилось 8 лет. В 2019 юный блогер заработал на $4 млн больше, чем в прошлом. Контент канала — это не только обзоры современных игрушек, но и настоящие научные эксперименты. Видео публикуются каждый день.
    ');
            $post -> setAnnotation('Сегодня благодаря Сети стать популярным и сделать состояние стало намного легче.');
            $post -> setDataAdd(new \DateTime('now'));
            $post -> setViewQuantity(rand(0,1000));
            $post -> setPostStatus(false);
            $post -> setBlog($blog);
            $post -> setImagePost('https://avatars.mds.yandex.net/get-zen_doc/3126430/pub_5f940909a81c50318ea64b39_5f973cd2b2613332b0462311/scale_1200');
            $manager->persist($post);
            $manager->flush();

            $comment = new Comment();
            $comment -> setCommentText('Актуально то как, информация за 2019 год)
    По версии Forbes, с 2020 года в мире никаких существенных изменений?');
            $comment -> setDataAddComment(new \DateTime('now'));
            $comment -> setCommentStatus(true);
            $comment -> setPost($post);
            $comment -> setUser($user);
            $manager->persist($comment);
            $manager->flush();


        $user = new User();
        $blog = new Blog();
        $blog -> setBlogName(' ');
        $user -> setUsername('Ninja');
        $user -> setApiToken(Uuid::v1()->toRfc4122());
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            'WdKrZ))ER'
        );
        $user -> setPassword($hashedPassword);
        $user -> setPhone('7(62)588-91-01');
        $user -> setEmail('saul69@yahoo.com');
        $user -> setRoles(['ROLE_ADMIN']);
        $user -> setBlog($blog);
        $manager->persist($user);
        $manager->flush();
        $manager->persist($blog);
        $manager->flush();

        $user = new User();
        $blog = new Blog();
        $blog -> setBlogName(' ');
        $user -> setUsername('Vera_01');
        $user -> setApiToken(Uuid::v1()->toRfc4122());
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            'CI6ytFIc0U57'
        );
        $user -> setPassword($hashedPassword);
        $user -> setPhone('7(10)422-14-07');
        $user -> setEmail('ppacocha@hotmail.com');
        $user -> setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();
        $manager->persist($blog);
        $manager->flush();

    }
}
