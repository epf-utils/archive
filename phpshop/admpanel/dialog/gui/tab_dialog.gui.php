<?php

function tab_dialog() {
    global $PHPShopInterface;

    $PHPShopOrm = new PHPShopOrm($GLOBALS['SysValue']['base']['dialog']);

    if (empty($_GET['search']) and empty($_GET['uid']) and empty($_GET['id'])) {
        $limit = array('limit' => 50);
        $where = array('isview' => "='1'");
        $whereisnotview = array('isview' => "='0'");
    } elseif (!empty($_GET['search'])) {
        $where = array('staffid' => "='1'", 'name' => " LIKE '%" . PHPShopSecurity::TotalClean($_GET['search']) . "%'");
        $whereisnotview = null;
        $limit = array('limit' => 100);
    } elseif (!empty($_GET['uid'])) {
        $where = array('user_id' => "=" . intval($_GET['uid']));
        $whereisnotview = null;
        $limit = array('limit' => 100);
    }
    elseif (!empty($_GET['user_id'])) {
        $where = array('user_id' => "=" . intval($_GET['user_id']));
        $whereisnotview = array('user_id' => "=" . intval($_GET['user_id']));
        $limit = array('limit' => 5);
        $empty=true;
    }

    $PHPShopOrm->debug = false;

    if (is_array($whereisnotview))
        $data_notview = $PHPShopOrm->select(array('chat_id,id,message,name,time,bot,user_id,name,isview'), $whereisnotview, array('group' => 'chat_id order by id desc'), $limit);

    $data_view = $PHPShopOrm->select(array('chat_id,id,message,name,time,bot,user_id,name,isview'), $where, array('group' => 'chat_id order by id desc'), $limit);

    if (is_array($data_notview) and is_array($data_view)) {

        foreach ($data_notview as $row)
            $data[$row['chat_id']] = $row;

        foreach ($data_view as $row) {

            if (!is_array($data[$row['chat_id']]))
                $data[$row['chat_id']] = $row;
        }
    }
    elseif (is_array($data_notview) and ! is_array($data_view))
        $data = $data_notview;
    else
        $data = $data_view;


    if (is_array($data)) {
        $tab = '<ul class="nav nav-pills nav-stacked">';
        foreach ($data as $row) {

            if ($row['chat_id'] == $_GET['id'] and empty($_GET['user_id']))
                $class = 'active';
            else
                $class = null;

            $data_chat = $PHPShopOrm->select(array('chat_id,id,message,name,time,bot,user_id'), array('staffid' => "='1'", 'isview' => "='0'", 'chat_id' => '=' . intval($row['chat_id'])), array('order' => 'id desc'), array('limit' => '50'));


            if (is_array($data_chat))
                $count = count($data_chat);
            else
                $count = 0;

            if (empty($data_chat[0]['staffid'])) {
                $row['name'] = $PHPShopOrm->getOne(array('name'), array('staffid' => "='1'", 'chat_id' => '=' . intval($row['chat_id'])))['name'];
                if (empty($row['name']) and $data_chat[0]['bot'] != 'message')
                    continue;
            }

            $row['name'] = substr($row['name'], 0, 20);

            if (!empty($count))
                $badge = '<span class="badge pull-right" id="badge-' . $row['chat_id'] . '">' . $count . '</span>';
            else
                $badge = '<span class="text-muted pull-right">&nbsp;' . PHPShopDate::get($row['time'], false, false, '.') . '</span>';


            if (!empty($data_chat[0]['message']) and $_GET['id'] != $row['chat_id'])
                $message = '<div style="padding-top:5px"><span class="text-muted">' . substr($data_chat[0]['message'], 0, 20) . '</span><span class="pull-right text-muted">' . PHPShopDate::get($row['time'], false, false, '.') . '</span></div>';
            else
                $message = null;

            $tab .= '<li class="' . $class . '"><a href="?path=dialog&id=' . $row['chat_id'] . '&bot=' . $row['bot'] . '&user=' . $row['user_id'] . '&return=dialog"><img src="../lib/templates/messenger/' . $row['bot'] . '.svg" title="' . ucfirst($row['bot']) . '" class="bot-icon">' . $row['name'] . $badge . $message . '</a></li>';
        }
        $tab .= '</ul>';
    } elseif(!$empty)
        $tab = $PHPShopInterface->setAlert('Записи отсутствуют.', 'info', true);

    return $tab;
}

?>