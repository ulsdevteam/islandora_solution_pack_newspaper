<!--Search Script-->
<script type="text/javascript">
  // a javascript handler for the search button click handling -- and redirect to the _GET that would represent the appropriate search  ?f[0]=catch_all_fields_mt%3A 
  function search_submit() {
    var search_filter = document.getElementById("search_filter").value;
    if (search_filter == '') {
      search_filter = '*';
    }
    var parent_newspaper_pid = "<?php print $parent_newspaper_pid; ?>";
    var new_parent_newspaper_pid = parent_newspaper_pid.replace("\:", String.fromCharCode(92) + ':');

    var redirect_GET = "<?php print $site_domain; ?>/islandora/search/catch_all_fields_mt%3A%28" + search_filter + "%29" +
      "?islandora_solr_search_navigation=0&f[0]=RELS_EXT_isMemberOf_uri_ms%3A*" + new_parent_newspaper_pid;
    history.pushState(history.state, "", window.location.href);
    window.location.replace(redirect_GET);
  }

  function promptKeyPress(e) {
    var unicode=e.keyCode? e.keyCode : e.charCode;
    if (unicode == 13) {
      search_submit();
    }
  }
</script>

<!--Search Input Bar-->
<input type="text" placeholder="Search all issues..." id="search_filter" name="search_filter" onkeyup="promptKeyPress(event);" value="" style="width:65%">
<input type="button" value="Search" onclick="search_submit();">

<p><u><a href="/islandora/search?islandora_solr_search_navigation=0&amp;f[0]=RELS_EXT_isMemberOf_uri_ms%3A*<?php print $parent_newspaper_pid; ?>">Browse issues</a></u></p>
