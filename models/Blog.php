<?php

namespace models;

use components\Model;

class Blog extends Model {

    public function getBlogs() {
        return [
            [
                'id' => 1,
                'title' => 'Почему никому и никогда нельзя отправлять коды подтверждения',
                'content' => 'Если просьба написана достаточно интеллигентным языком, то выглядит она крайне убедительно — добрые люди, готовые помочь вежливому человеку, реагируют и обещают переслать код. Код приходит, они отправляют его автору сообщения, тот в ответ рассыпается в благодарностях. Но на самом деле они только что отдали этому человеку доступ к своему аккаунту.'
            ],
            [
                'id' => 2,
                'title' => 'Какой будет реклама в голосовых помощниках',
                'content' => 'Около года назад с голосовым помощником Google Home произошел интересный случай: владелец устройства воспользовался функцией My Day (когда спрашиваешь у помощника, каким будет твой день, а он в ответ сообщает погоду, новости и запланированные задачи). Вместе с этой информацией помощник сообщил, что, мол, кстати, в кинотеатрах поблизости начался показ фильма «Красавица и чудовище». Дальше звучала музыка из нового фильма, а устройство предлагало узнать о нем больше.'
            ],
            [
                'id' => 3,
                'title' => 'Как и зачем отключать поиск по номеру телефона «Вконтакте»',
                'content' => 'Недавно в соцсети «ВКонтакте» появилась новая настройка – «Кто может найти меня при импорте контактов по номеру». Вроде бы благое начинание: хочешь, чтобы тебя нельзя было найти, – настрой, не найдут. Вот только по умолчанию искать вас позволено вообще всем пользователям, а раньше даже и выбора не было! Сама «ВКонтакте» особо о появлении новой настройки не распространяется, так что многие пользователи не в курсе и используют настройки по умолчанию. А надо бы поменять.'
            ],
        ];
    }

    public function getBlog($id) {
        return
            [
                'id' => 1,
                'title' => 'Почему никому и никогда нельзя отправлять коды подтверждения',
                'content' => 'Если просьба написана достаточно интеллигентным языком, то выглядит она крайне убедительно — добрые люди, готовые помочь вежливому человеку, реагируют и обещают переслать код. Код приходит, они отправляют его автору сообщения, тот в ответ рассыпается в благодарностях. Но на самом деле они только что отдали этому человеку доступ к своему аккаунту.'
            ];
    }

}