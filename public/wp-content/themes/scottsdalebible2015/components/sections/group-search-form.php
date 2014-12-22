<?php if(!isset($wp)) { return; } ?>

<section class="group-search-form">
    <form>
        <div class="row">
            <div class="large-2 columns">
                <select name="">
                    <option value="">Campus</option>
                </select>
            </div>
            <div class="large-2 columns">
                <select name="">
                    <option value="">Category</option>
                </select>
            </div>
            <div class="large-2 columns">
                <select name="">
                    <option value="">Day</option>
                </select>
            </div>
            <div class="large-2 columns">
                <select name="">
                    <option value="">Time</option>
                </select>
            </div>
            <div class="large-2 columns">
                <div>
                    <i class="fa fa-circle-o"></i> Children
                    <input type="hidden" name="children_friendly" value="" />
                </div>
                <div>
                    <i class="fa fa-circle-o"></i> On Campus
                    <input type="hidden" name="on_campus" value="" />
                </div>
            </div>
            <div class="large-2 columns">
                <a href="#" class="button">Submit</a>
            </div>
        </div>
    </form>
</section>