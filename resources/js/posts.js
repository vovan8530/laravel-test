function createPost() {
    window.location.href = "/admin/posts/create";
}


function showPost(postId) {
    window.location.href = "/admin/posts/" + postId;
}

function editPost(postId) {
    window.location.href = "/admin/posts/" + postId + "/edit";
}

function showPostUser(postId) {
    window.location.href = "/posts/" + postId;
}


window.showPost = showPost;
window.editPost = editPost;
window.createPost = createPost;
window.showPostUser = showPostUser;


