let videoLister = document.querySelectorAll(".video_list .vid_thumb");
 let mainVideo = document.querySelector(".main_video video");
 let mainTitle = document.querySelector(".main_video .title");


 videoLister.forEach( video =>{
    video.onclick = ()=>{
        videoLister.forEach(vid_thumb => vid_thumb.classList.remove("active"));
        video.classList.add("active");
        if(video.classList.contains("active")){
            let src = video.children[0].getAttribute('src');
            mainVideo.src = src;
        let text = video.children[1].innerHTML;
        mainTitle.innerHTML = text;
        }
    }
 });



