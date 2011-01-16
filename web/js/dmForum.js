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


