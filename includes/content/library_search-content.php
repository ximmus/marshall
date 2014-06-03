<?php // Library Search Box Content // ?>
<div id="library-search">
  <ul>
    <li><a href="#onesearch">OneSearch</a></li>
    <li><a href="#catalog">Catalog</a></li>
    <li><a href="#database">Databases</a></li>
  </ul>
  <div class="clear"></div>
  <div id="onesearch" class="searchform">
    <form method="get" action="http://ufl.summon.serialssolutions.com/search">
      <!-- <input type="image" src="http://www.law.ufl.edu/wordpress/wp-content/plugins/uflaw_shortcode/images/onesearch_logo_91x30px.png" id="input_formOnesearch_2" alt="Search Button" > -->
      <input type="hidden" name="s.fvf[]" value="Library,LEGAL INFORMATION CENTER">
      <input id="text_formOnesearch" type="text" name="s.q" placeholder="Search OneSearch">
      <button type="submit"><?php include( get_stylesheet_directory() . '/images/svg/search-button.svg'); ?></button>
    </form>
  </div>
  <div id="catalog" class="searchform">
    <form id="formCatalog" action="http://uf.catalog.fcla.edu/uf.jsp" method="get" onclick="("/outgoing/catalog-form");">
      <input id="text_formCatalog" type="text" name="st" value="" placeholder="Search Catalog" />
      <select id="catsearch" name="ix">
        <option selected="selected" value="kw">Anywhere</option>
        <option value="t1">Advanced</option>
        <optgroup label="Basic Search">
          <option value="ti">Title</option>
          <option value="jt">Journal Title</option>
          <option value="au">Author</option>
          <option value="su">Subject Heading</option>
          <option value="si">Series</option>
          <option value="nu">ISBN, ISSN, OCLC, etc.</option>
          <option value="cn">Call Numbers</option>
        </optgroup>
          <optgroup label="Begins With Search">
          <option value="btitle">Title</option>
          <option value="bauthor">Author</option>
          <option value="bcallno">LC Call Number</option>
          <option value="bnlm">NLM Call Number</option>
          <option value="bgdocno">Government Document Call Number</option>
          <option value="bdewey">Dewey Decimal Call Number</option>
        </optgroup>
      </select>
      <button type="submit"><?php include( get_stylesheet_directory() . '/images/svg/search-button.svg'); ?></button>
  </form>
  </div>
  <div id="database">
    <form id="form-database">
    <select onchange="window.open(this.options[this.selectedIndex].value)">
      <option selected="selected" value="http://www.law.ufl.edu/library/library-information/find-a-database">Select a Database</option>
      <option value="http://www.bloomberglaw.com/">Bloomberg Law</option>
      <option value="https://apps.fastcase.com/Research/Pages/Start.aspx">Fastcase</option>
      <option value="http://heinonline.org/HOL/Welcome?collection=journals">HeinOnline</option>
      <option value="http://www.lexisnexis.com/hottopics/lnacademic/?flapID=legal">LexisNexis</option>
      <option value="http://scholarship.law.ufl.edu/">UF Law Scholarship Repository</option>
      <option value="http://lawschool.westlaw.com/">Westlaw</option>
    </select>
  </form>
  </div>
</div>