<?php
   /*
   Template Name: RSS
   */
   get_header(); ?>



<div class="" style="margin:auto;max-width:800px;background:black;padding:100px; text-align:center">
<button class="basic-btn btn--yellow"type="button" name="button" onclick="run_update()"> <span class="basic-btn__text">Päivitä RSS</span> <span class="basic-btn__icon">
  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"/></svg>
</span> </button>
</div>

<script type="text/javascript">
function run_update() {
var the_url = ajaxurl;
let params = new FormData;
params.append('action', 'update_rss');


axios.post(the_url, params )
.then( function (response) {
console.log("RSS UPDATED");
})
.catch( function (error) {
  console.log(error);
});

}

</script>

    </main><!-- #main -->
  </div><!-- #primary -->
