<?php
/**
 * loop for laskenta
 *
 * You are encouraged to add to your footer here.
 * You can make use of the acf theme settings page to add footer fields and output them here
 *
 * @package Lifted
 * @since 1.0
 * @version 1.0
 */

?>


<?php	if( $posts_laskenta ): ?>
  <?php foreach( $posts_laskenta as $post ):
    setup_postdata( $post ); ?>

    <?php $alue_term = get_field( 'alue' ); ?>
    <?php $id = get_the_ID(); ?>

  <tr id="<?php echo $id; ?>" class="Anim-item--list" data-area="<?php if ( $alue_term ): ?><?php echo $alue_term->slug; ?><?php endif; ?>">

     <?php if ( have_rows( 'kohde' ) ) : ?>
  <?php while ( have_rows( 'kohde' ) ) : the_row(); ?>
    <td class="td--kohde">
      <div class="flx-container">
        <?php if( get_sub_field('rakennuttaja') ): ?>
              <span class="td__label"><?php the_sub_field( 'rakennuttaja' ); ?></span>
         <?php endif; ?>
         <?php if(!get_sub_field('rakennuttaja') ): ?>
                 <span class="td__label">&#8203;</span>
          <?php endif; ?>

      <span class="td__name"><?php the_sub_field( 'kohteen_osoite' ); ?></span>
      <span class="td__xtra-info">
        <span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg"><?php echo $alue_term->name; ?></span>
      <?php if( get_sub_field('lisatiedot') ): ?>
        <span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg"><?php the_sub_field( 'lisatiedot' ); ?></span>
       <?php endif; ?>
    </span>
      </div>
    </td>
  <?php endwhile; ?>
<?php endif; ?>
<td class="td--basic-cell">
  <div class="">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">Helsinki</span>
    <span class="td__xtra-info">&#8203;</span>
    </div>
  </div>

</td>
<td class="td--basic-cell">
  <div class="">
    <div class="flx-container">
      <span class="td__label td__label--basic">Tyyppi</span>
    <span class="td__name"><?php the_field( 'kohteen_tyyppi' ); ?></span>
    <span class="td__xtra-info">&#8203;</span>
    </div>
  </div>

</td>
<td class="td--basic-cell">
  <div class="">
    <div class="flx-container">
      <span class="td__label td__label--basic">Bruttoala</span>
    <span class="td__name"><?php the_field( 'bruttoala_m2' ); ?></span>
    <span class="td__xtra-info">&#8203;</span>
    </div>
  </div>

</td>
<td class="td--basic-cell">
  <div class="">
    <div class="flx-container">
      <span class="td__label td__label--basic">Tilavuus</span>
    <span class="td__name"><?php the_field( 'tilavuus_m3' ); ?></span>
    <span class="td__xtra-info">&#8203;</span>
    </div>
  </div>

</td>
<td class="td--basic-cell">
  <div class="">
    <div class="flx-container">
      <span class="td__label td__label--basic">Tarjous</span>
    <span class="td__name"><?php the_field( 'tarjous_pvm' ); ?></span>
    <span class="td__xtra-info">&#8203;</span>
    </div>
  </div>

</td>
<td class="td--basic-cell">
  <div class="">
    <div class="flx-container">
      <span class="td__label td__label--basic">Valmistuu</span>
      <?php if ( have_rows( 'valmistuu' ) ) : ?>
<?php while ( have_rows( 'valmistuu' ) ) : the_row(); ?>
<?php $date = get_sub_field( 'valmistumisaika', false, false ); ?>

<?php if ($date < $today and ($date )) { ?>
<span class="td__name -yellow">Valmis</span>
<?php } else { ?>
<span class="td__name"><?php the_sub_field( 'viikko' ); ?></span>

<?php } ?>

<?php if( get_sub_field('valmistumisen_lisatiedot') ): ?>
<span class="td__xtra-info"><?php the_sub_field( 'valmistumisen_lisatiedot' ); ?></span>
<?php endif; ?>
<?php if(!get_sub_field('valmistumisen_lisatiedot') ): ?>
   <span class="td__xtra-info">&#8203;</span>
<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>



    </div>
  </div>
<div class="tr__hover-action-indicator js--show-form-modal">Pyydä tarjous</div>
</td>

      </tr>
   <?php endforeach; ?>
   <?php wp_reset_postdata(); ?>
  <?php endif; ?>

<!-- <tr class="Anim-item--list" data-area="etela">
  <td class="td--kohde">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">Pisan päiväkoti</span>
    <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span></span>
    </div>


  </td>

  <td class="td--basic-cell">
    <div class="">
      <div class="flx-container">
        <span class="td__label">&#8203;</span>
      <span class="td__name">Saneeraus</span>
      <span class="td__xtra-info">&#8203;</span>
      </div>
    </div>

  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">1087</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">24899</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">16.02.2022</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">vko 50</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>


</tr>

<tr class="Anim-item--list" data-area="ita">
  <td class="td--kohde">
    <div class="flx-container">
      <span class="td__label">ELO</span>
    <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
    <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Itä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
    </div>


  </td>

  <td class="td--basic-cell">
    <div class="">
      <div class="flx-container">
        <span class="td__label">&#8203;</span>
      <span class="td__name">Uudisrakennus</span>
      <span class="td__xtra-info">&#8203;</span>
      </div>
    </div>

  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">19187</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">120499</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">15.09.2021</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">vko 49</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>


</tr>


<tr class="Anim-item--list" data-area="paakaupunki">
  <td class="td--kohde">
    <div class="flx-container">
      <span class="td__label">Heka</span>
    <span class="td__name">Maunula Töyrytie 3</span>
    <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Pääkaupunkiseutu</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 92 kpl</span></span>
    </div>


  </td>

  <td class="td--basic-cell">
    <div class="">
      <div class="flx-container">
        <span class="td__label">&#8203;</span>
      <span class="td__name">Laajennus,<br>Saneeraus</span>
      <span class="td__xtra-info">&#8203;</span>
      </div>
    </div>

  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">8187</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">24499</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">15.12.2021</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name -yellow">Valmis</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>


</tr>

<tr class="Anim-item--list" data-area="pohjois">
  <td class="td--kohde">
    <div class="flx-container">
      <span class="td__label">Heka</span>
    <span class="td__name">Maunula Töyrytie 3</span>
    <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Pohjois-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 92 kpl</span></span>
    </div>


  </td>

  <td class="td--basic-cell">
    <div class="">
      <div class="flx-container">
        <span class="td__label">&#8203;</span>
      <span class="td__name">Laajennus</span>
      <span class="td__xtra-info">&#8203;</span>
      </div>
    </div>

  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">8187</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">24499</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">15.12.2021</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name -yellow">Valmis</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>


</tr>

<tr class="Anim-item--list" data-area="etela">
  <td class="td--kohde">
    <div class="flx-container">
      <span class="td__label">ELO</span>
    <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
    <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
    </div>


  </td>

  <td class="td--basic-cell">
    <div class="">
      <div class="flx-container">
        <span class="td__label">&#8203;</span>
      <span class="td__name">Uudisrakennus</span>
      <span class="td__xtra-info">&#8203;</span>
      </div>
    </div>

  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">19187</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">120499</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">15.09.2021</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">vko 49</span>
      <span class="td__xtra-info">Viimeistään 15.06.2020</span>
    </div>
  </td>


</tr>
<tr class="Anim-item--list" data-area="etela">
  <td class="td--kohde">
    <div class="flx-container">
      <span class="td__label">ELO</span>
    <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
    <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
    </div>


  </td>

  <td class="td--basic-cell">
    <div class="">
      <div class="flx-container">
        <span class="td__label">&#8203;</span>
      <span class="td__name">Uudisrakennus</span>
      <span class="td__xtra-info">&#8203;</span>
      </div>
    </div>

  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">19187</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">120499</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">15.09.2021</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">vko 49</span>
      <span class="td__xtra-info">Viimeistään 15.06.2020</span>
    </div>
  </td>


</tr>
<tr class="Anim-item--list" data-area="etela">
  <td class="td--kohde">
    <div class="flx-container">
      <span class="td__label">ELO</span>
    <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
    <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
    </div>


  </td>

  <td class="td--basic-cell">
    <div class="">
      <div class="flx-container">
        <span class="td__label">&#8203;</span>
      <span class="td__name">Uudisrakennus</span>
      <span class="td__xtra-info">&#8203;</span>
      </div>
    </div>

  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">19187</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">120499</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">15.09.2021</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">vko 49</span>
      <span class="td__xtra-info">Viimeistään 15.06.2020</span>
    </div>
  </td>


</tr>
<tr class="Anim-item--list" data-area="etela">
  <td class="td--kohde">
    <div class="flx-container">
      <span class="td__label">ELO</span>
    <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
    <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
    </div>


  </td>

  <td class="td--basic-cell">
    <div class="">
      <div class="flx-container">
        <span class="td__label">&#8203;</span>
      <span class="td__name">Uudisrakennus</span>
      <span class="td__xtra-info">&#8203;</span>
      </div>
    </div>

  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">19187</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">120499</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">15.09.2021</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">vko 49</span>
      <span class="td__xtra-info">Viimeistään 15.06.2020</span>
    </div>
  </td>


</tr>
<tr class="Anim-item--list" data-area="etela">
  <td class="td--kohde">
    <div class="flx-container">
      <span class="td__label">ELO</span>
    <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
    <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
    </div>


  </td>

  <td class="td--basic-cell">
    <div class="">
      <div class="flx-container">
        <span class="td__label">&#8203;</span>
      <span class="td__name">Uudisrakennus</span>
      <span class="td__xtra-info">&#8203;</span>
      </div>
    </div>

  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">19187</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">120499</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">15.09.2021</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">vko 49</span>
      <span class="td__xtra-info">Viimeistään 15.06.2020</span>
    </div>
  </td>


</tr>
<tr class="Anim-item--list" data-area="etela">
  <td class="td--kohde">
    <div class="flx-container">
      <span class="td__label">ELO</span>
    <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
    <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
    </div>


  </td>

  <td class="td--basic-cell">
    <div class="">
      <div class="flx-container">
        <span class="td__label">&#8203;</span>
      <span class="td__name">Uudisrakennus</span>
      <span class="td__xtra-info">&#8203;</span>
      </div>
    </div>

  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">19187</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">120499</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>

  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">15.09.2021</span>
      <span class="td__xtra-info">&#8203;</span>
    </div>
  </td>
  <td class="td--basic-cell">
    <div class="flx-container">
      <span class="td__label">&#8203;</span>
    <span class="td__name">vko 49</span>
      <span class="td__xtra-info">Viimeistään 15.06.2020</span>
    </div>
  </td>


</tr> -->
