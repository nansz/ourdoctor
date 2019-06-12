<section class="section-search">
    <div class="section-wrap">
        <div class="section-container">
            <div class="section__content">
                <!-- поиск -->
                <form class="search-form" action="/search/" method="GET" >
                    <div class="search-form__item">
                        <div class="input-wrap">


                           <!-- id="kinput" -->     <input id="kinput"  class="input input--search"
                                   type="text" name="search"  value="<?php if(isset($_GET['search'])) { echo $_GET['search']; } ?>" placeholder="<?php echo translate('Начните вводить...', 'Почніть вводити ...', 'Start typing ...'); ?> "
                            >
                            <div class="dropdown-search">
                                <ul id="resultsz" class="results">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value=" <?php echo translate('Искать', 'Шукати', 'Search'); ?>">
                </form>
                <!-- поиск -->
            </div>
        </div>
    </div>
</section>