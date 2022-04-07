<?php

require_once('../app/model/model.php');

class PostModel extends Model
{
    protected $table = "post";

    public function insertPosts()
    {
        $content = " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et ullamcorper sem. Curabitur vel varius magna. Sed a nunc hendrerit, ultricies lorem sit amet, auctor eros. Fusce pharetra sit amet purus id euismod. Donec ultricies diam ut iaculis luctus. Integer sed augue nisi. Sed id dapibus nulla. Sed porta nisl tellus, non imperdiet mi molestie id. Vivamus finibus felis ut dolor cursus, eget rutrum nisl suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc aliquam, quam nec accumsan tincidunt, urna ipsum lacinia turpis, eget porttitor turpis sem at quam. Proin tincidunt commodo nisl, a varius nunc elementum eget.

        Donec at convallis mauris, vitae lacinia nisi. Nunc lectus eros, tristique in pellentesque quis, suscipit id mauris. In a ullamcorper sapien. Vivamus quis dignissim augue. Phasellus euismod aliquam leo, vitae commodo lorem congue porta. Cras condimentum, est quis lacinia lobortis, erat metus malesuada mauris, sed dignissim arcu ex in velit. Sed non quam arcu. Nam non velit leo. Morbi bibendum massa in magna sagittis, eu fermentum nulla efficitur. In auctor aliquam nulla, id auctor magna cursus eget. Vestibulum dapibus varius tortor semper rhoncus.
        
        Fusce ut enim laoreet ipsum aliquet ultrices ac imperdiet ipsum. Donec tincidunt tristique porttitor. Aliquam erat volutpat. Sed dapibus, neque ac vulputate faucibus, nulla lorem viverra dolor, a dapibus nunc libero eget metus. Etiam nec varius orci, eu tincidunt turpis. Nullam tincidunt ex arcu, ut molestie nibh molestie quis. In congue efficitur tristique. Sed molestie at dolor eleifend pulvinar. Phasellus commodo orci eu diam commodo lobortis. Duis et porta ante, quis gravida justo. Nulla leo nisi, condimentum porttitor sollicitudin vel, mattis porttitor dui. Duis viverra maximus libero, et mattis lacus luctus at. Vivamus eget aliquet dui, sed congue dui. Mauris pretium ac purus vel elementum. Aliquam nec eros ut purus euismod imperdiet. ";

        for($i=1; $i<50; $i++)
        { 
            $int = mt_rand(1262055681, 1562055681);
            $date = date("Y-m-d H:i:s", $int);
           
            // $query = "INSERT INTO post(name, slug, content, created_at) VALUES('post', 'post, 'stjytdyjtujkg', NOW())";
            $query = "INSERT INTO post(name, slug, content, created_at) VALUES('post{$i}', 'post-{$i}', '{$content}', '{$date}')";
            $this->db->write($query);
        }

    
    }

    public function getLimitItems($limit, $offset)
    {
        $query = "SELECT * FROM $this->table ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
        return $this->db->read($query);
    }
}
