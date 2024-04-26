$start = 10;
$(document).ready(
  // Ajax function to load posts asynchronously.
  function load_posts() {
    $("#load_more").click(function () {
      $.ajax({
        url: "ajax.php",
        method: "POST",
        dataType: "json",
        data: {
          starting: $start,
        },
        success: function (response) {
          if (response['meaasge'] == undefined) {
            $start = $start + 10;
            response.forEach(element => {
              createPost(element);
            });
          } else {
            document.getElementById("message").innerHTML = 'No more post available';
          }
        },
        error: function (xhr, status, error) {
          // Handle AJAX errors
          alert('could not load posts');
        },
      });
    });
  }
);

/**
 * This function load posts, it create proper structure for a post and add to the html.
 *
 * @param $row
 *   All data for a post.
 *
 * @return void
 */
function createPost($row) {
  // Create the post div.
  let postDiv = document.createElement("div");
  postDiv.classList.add("post");

  // Create the upper div.
  let upperDiv = document.createElement("div");
  upperDiv.classList.add("upper");

  // Create the profile div.
  let profileDiv = document.createElement("div");
  profileDiv.classList.add("profile");

  // Create the profile image link.
  let profileLink = document.createElement("a");
  profileLink.href = "/Profile/" + $row["email"];

  // Create the profile image element.
  let profileImg = document.createElement("img");
  let userPhoto = "assets/profile_images/" + $row["email"] + ".jpg";
  profileImg.src = userPhoto;

  // Append the profile image to the link.
  profileLink.appendChild(profileImg);

  // Create and append the username paragraph.
  let usernameP = document.createElement("p");
  usernameP.classList.add("username");
  usernameP.textContent = $row["email"];

  // Append the link and username to the profile div.
  profileDiv.appendChild(profileLink);
  profileDiv.appendChild(usernameP);

  // Create and append the time div.
  let timeDiv = document.createElement("div");
  timeDiv.classList.add("time");
  timeDiv.textContent = $row["time"];

  // Append profile div and time div to the upper div.
  upperDiv.appendChild(profileDiv);
  upperDiv.appendChild(timeDiv);

  // Create the content div.
  let contentDiv = document.createElement("div");
  contentDiv.classList.add("content");

  // Create and append the content paragraph.
  let contentP = document.createElement("p");
  contentP.textContent = $row["content"];

  // Append content paragraph to the content div.
  contentDiv.appendChild(contentP);

  // Create the image div.
  let imageDiv = document.createElement("div");
  imageDiv.classList.add("image");

  // Check if there is an image path.
  if ($row["image_path"] !== null) {
    // Create and append the image element.
    let imageImg = document.createElement("img");
    imageImg.src = "assets/post_images/" + $row["image_path"];

    // Append image to the content div.
    imageDiv.appendChild(imageImg);
    contentDiv.appendChild(imageDiv);
  }

  // Append upper div and content div to the post div
  postDiv.appendChild(upperDiv);
  postDiv.appendChild(contentDiv);

  // Append the post div to the element with class 'posts'
  document.querySelector(".posts").appendChild(postDiv);
}

/**
 * This function to check if a file exists.
 *
 * @param url
 *   File path where response is located.
 *
 * @return bool
 *   Return true if exist else false.
 */
function fileExists(url) {
  let http = new XMLHttpRequest();
  http.open("HEAD", url, false);
  http.send();
  return http.status !== 404;
}

/**
 * This function reduce the posts from bottom.
 *
 * @return void
 */
function deleteChildren() {
  let parentDiv = document.getElementById("posts");
  let children = parentDiv.children;

  // Start from the last child and iterate backwards
  if (($start / 10) >= 2) {
    for (let i = children.length - 1; i >= $start - 10; i--) {
      parentDiv.removeChild(children[i]);
    }
    $start = $start - 10;
  } else {
    for (let i = $start - 1; i >= 10; i--) {
      parentDiv.removeChild(children[i]);
    }
    $start = 10;
  }
}
