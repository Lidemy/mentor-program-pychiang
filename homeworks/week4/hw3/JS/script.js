let offset = 0;
let isLoading = false;
const container = document.getElementsByClassName('container')[0];

//connect with Twitch API
const getStreams = () => { 
    isLoading = true;

    const clientID = '30vl9dbtf7whfh5ejeob3myp2gfuyo';
    const gameName = 'League%20of%20Legends';
    const gameLimit = 20;
    const request = new XMLHttpRequest();
    request.open('GET', `https://api.twitch.tv/kraken/streams?client_id=${clientID}&game=${gameName}&limit=${gameLimit}&offset=${offset}`, true);
    request.onreadystatechange = function() {
        //.readyState is used to determine the state of the request, provided by user agent
        //.status is used to determine whether the request was successful or not, provided by server
        if (this.readyState === 4 && this.status === 200) { 
            const response = JSON.parse(this.responseText);
            //first argument of callback funtion is used to indicat an error
            //so first argument is null indicating the operation is successful
            callBack(null, response);   
        } else {
            callBack(err);
        }
    }
    request.send();
}

//connect Twitch API with jQuery
//var getStreams = function() {
//     isLoading = true;
//     $.ajax({
//         method: 'GET',
//         url: 'https://api.twitch.tv/kraken/streams?client_id=' + clientID + '&game=' + gameName + '&limit=' + gameLimit + '&offset=' + offset,
//         success: function (response) {
//             var streams = response.streams;

//             for (var i = 0; i < streams.length; i++) {
//                 $(getViewbox(streams[i])).insertBefore($('#first_viewbox'));
//             }
//             offset += 10;
//             isLoading = false;
//         },
//         error: function(err) {
//             $container.append('<div class="error">Failed to Load Twitch Data.</div>');
//         }
//     });
// }

//takes care of error and stream data from Twitch API
const callBack = function(err, data) {
    if (err) {
        const errorDiv = document.createElement('div');
            errorDiv.className = 'error';
            errorDiv.innerHTML = 'Failed to Load Twitch Data.';
            container.appendChild(errorDiv);
    } else {
        offset += 10;
        isLoading = false;
        const streams = data.streams;
        for (let i = 0; i < streams.length; i++) {
            const firstViewbox = document.getElementById('first_viewbox');
            const div = document.createElement('div');
                div.className = 'view';
                div.innerHTML = getViewbox(streams[i]);
                firstViewbox.parentNode.insertBefore(div, firstViewbox);
        }
    }
}
//insertBefore() refers to the following link:
//https://stackoverflow.com/questions/19315948/insert-html-before-element-in-javascript-without-jquery

//takes care of how to display the date on HTML
const getViewbox = (data) => {
    let twitchLiveUrl = `https://www.twitch.tv/${data.channel.name}`;
    return `
    <div class="viewbox">
        <div class="preview">
            <a href="${twitchLiveUrl}" target="_blank"><img src="${data.preview.medium}"  onload="this.style.opacity=1"></a>
        </div>
        <div class="bottom">
            <div class="headpic">
                <img src="${data.channel.logo}" onload="this.style.opacity=1">
            </div>
            <div class="intro">
                <div class="channel_name">${data.channel.status}</div>
                <div class="host_name">${data.channel.display_name}</div>
            </div>
        </div>
    </div>`;
}

document.addEventListener('DOMContentLoaded', () => {
    getStreams();
})


//inifinte scroll without jQuery
// var documentHeight = function () {
//     var body = document.body;
//     var html = document.documentElement;
//     return Math.max(
//       body.offsetHeight,
//       body.scrollHeight,
//       html.clientHeight,
//       html.offsetHeight,
//       html.scrollHeight
//     );
// }

// var scrollTop = function() {
//     return (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
// }

// document.addEventListener("DOMContentLoaded", function() {
//     getStreams();
//     window.addEventListener('scroll', function() {
//         if (scrollTop() + window.innerHeight > documentHeight() - 100) {
//             if (!isLoading) {
//                 getStreams();
//             }
//         }
//     });
// });


//jQuery inifinte scroll
// $(document).ready(function() {
//     getStreams();
//     $(window).scroll(function() {
//         if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
//             if(!isLoading) {
//                 getStreams();
//             }
            
//         }
//     });
// });
