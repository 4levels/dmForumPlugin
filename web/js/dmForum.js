function addTopic(forum_id) {
    var output = $.ajax(
        {
            type: 'POST',
            url: dm_configuration.script_name + '+/topic/addNewTopic',
            data: 'forum_id=' + forum_id,
            async: false
        }
    ).responseText;

    $("#new_topic_form").html(output);
}

function addTopicPost(topic_id) {
    var output = $.ajax(
        {
            type: 'POST',
            url: dm_configuration.script_name + '+/post/addNewPost',
            data: 'topic_id=' + topic_id,
            async: false
        }
    ).responseText;

    $("#new_topic_form").html(output);
}

function addPost(topic_id) {
    var output = $.ajax(
        {
            type: 'POST',
            url: dm_configuration.script_name + '+/post/addReply',
            data: 'topic_id=' + topic_id,
            async: false
        }
    ).responseText;

    $("#new_post_form").html(output);
}

function saveForumTopic() {
    var options = {
        target: '#new_topic_form',
        success: showResponse
    };
    
    $("#add_topic_form").ajaxSubmit(options);

    return false;
}

function saveForumPost() {
    var options = {
        target: '#new_topic_form',
        success: showResponse
    }

    $("#add_post_form").ajaxSubmit(options);

    return false;
}

function saveForumTopicReply() {
    var options = {
        target: '#new_post_form',
        success: showResponse
    }

    $("#add_reply_form").ajaxSubmit(options);

    return false;
}

function showResponse(responseText, statusText, xhr, $form)  {
    
}

function deleteForumPost(id) {
    var output = $.ajax(
        {
            type: 'POST',
            url: dm_configuration.script_name + '+/post/delete',
            data: 'post_id=' + id,
            async: false
        }
    ).responseText;

    $("#post-content-"+id).html(output);
}

function deleteForumPostConfirm(id) {
    $.ajax({
       type: 'POST',
       url: dm_configuration.script_name + '+/post/delete',
       data: 'post_id=' + id + '&confirmed=1',
       async: false
    });

    location.reload();
}

function editForumPost(id) {
    var output = $.ajax(
        {
            type: 'GET',
            url: dm_configuration.script_name + '+/post/edit',
            data: 'id=' + id,
            async: false
        }
    ).responseText;

    $("#post-content-"+id).html(output);
}

function updateForumPost(id) {
    var options = {
        target: '#post-content-' + id,
        success: showResponse
    }

    $("#edit_post_form").ajaxSubmit(options);

    return false;
}

function approveForumPost(id, action) {
    switch(action) {
        case 'ask':
            var output = $.ajax({
               type: 'GET',
               url: dm_configuration.script_name + '+/post/approve',
               data: 'post_id=' + id,
               async: false
            }).responseText;
            $("#post-content-"+id).html(output);
            break;
        case 'forbid':
            $.ajax({
                type: 'POST',
                url: dm_configuration.script_name + '+/post/delete',
                data: 'post_id=' + id + '&confirmed=1',
                async: false
            });
            location.reload();
            break;
        case 'approve':
            $.ajax({
                type: 'GET',
                url: dm_configuration.script_name + '+/post/approve',
                data: 'post_id=' + id + '&approve=1',
                async: false
            });
            location.reload();
            break;
    }
}

function approveForumTopic(id, action) {
    switch(action) {
        case 'ask':
            var output = $.ajax({
               type: 'GET',
               url: dm_configuration.script_name + '+/topic/approve',
               data: 'topic_id=' + id,
               async: false
            }).responseText;
            $("#topic-content-"+id).html(output);
            break;
        case 'forbid':
            $.ajax({
                type: 'POST',
                url: dm_configuration.script_name + '+/topic/approve',
                data: 'topic_id=' + id + '&delete=1',
                async: false
            });
            location.reload();
            break;
        case 'approve':
            $.ajax({
                type: 'GET',
                url: dm_configuration.script_name + '+/topic/approve',
                data: 'topic_id=' + id + '&approve=1',
                async: false
            });
            location.reload();
            break;
    }
}
