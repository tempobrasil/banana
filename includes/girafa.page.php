<?
class girafaPage{

  function SetPageTitle($title, $subtitle = true){

    if($subtitle)
      $title .= ' &mdash; ' . get_config('SITE_TITLE');

    set_config('PAGE_TITLE', $title);
  }

  function GetPageTitle(){
    return get_config('PAGE_TITLE');
  }

  function SetPageDescription($description){
    set_config('PAGE_DESCRIPTION', $description);
  }

  function GetPageDescription(){
    return get_config('PAGE_DESCRIPTION');
  }

  function SetPageTags($tags){
    set_config('PAGE_TAGS', $tags);
  }

  function GetPageTags(){
    return get_config('PAGE_TAGS');
  }

  function SetPageNoIndex(){
    set_config('PAGE_ROBOTS', 'noindex, nofollow');
  }

  function GetPageRobots(){
    return get_config('PAGE_ROBOTS');
  }

}
?>