<?php
class PreviewProvider{
    private $con;
    private $username;

    public function __construct($con, $username){
        $this->con = $con;
        $this->username = $username;
    }   

    public function createPreviewVideo($entity){
        if($entity ==null){
            $entity = $this->getRandomEntity();
        }

        $id = $entity->getId();
        $name = $entity->getName();
        $preview = $entity->getPreview();
        $thumbnail = $entity->getThumbnail();

        

        $videoId = videoProvider::getEntityVideoForUser($this->con, $id, $this->username);
        $video = new Video($this->con, $videoId);

        $seasonEpisode = $video->getSeasonAndEpisode();
        $subHeading = $video->isMovie()?"": "<h4>$seasonEpisode</h4>";

        return 
        "<div class='previewContainer'>
         <img src='$thumbnail' class='previewImage' hidden>
        <video autoplay muted class='previewVideo' onended='previewEnded()'>
        <source src='$preview' type='video/mp4'>
        </video>
        <div class='previewOverlay'>
        <div class='mainDetails'>
            <h3>$name</h3>
            $subHeading
            <div class='buttons'>
            <button onclick='watchVideo($videoId)'>
            <i class='fa-solid fa-play'></i> Play </button>
            <button onclick='volumeToggle(this)'> 
            <i class='fa-solid fa-volume-mute'></i>
            volume </button>
            </div>
        </div>
        </div>
        </div>";
    }

    public function createEntityPreviewSquare($entity){
        $id = $entity->getId();
        $thumbnail = $entity->getThumbnail();
        $name = $entity->getName();
        return "<a href='entity.php?id=$id'>
            <div class='previewContainer small'>
                <img src='$thumbnail' title='$name'></img>
            </div>
        </a>";
    }

    private function getRandomEntity(){
        $entity = EntityProvider::getEntities($this->con,null,1);
        return $entity[0];
    }
}
?>