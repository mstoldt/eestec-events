<?php include 'header.php'; ?>


<div style="width: 80%; margin: 0px auto">
	<div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input id="name" type="text" length="10">
            <label for="name">Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="start_date" type="text" length="10">
            <label for="start_date">Start date</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="end_date" type="text" length="10">
            <label for="end_date">End date</label>
          </div>
        </div>

		<div class="row">
        <div class="input-field col s12">
          <textarea id="description" class="materialize-textarea"></textarea>
          <label for="description">Description</label>
        </div>
      </div>
		<div class="row">
          <div class="input-field col s6">
            <input id="lc" type="text" length="10">
            <label for="lc">LC</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="announce_date" type="text" length="10">
            <label for="announce_date">Announced date</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="deadline" type="text" length="10">
            <label for="deadline">Deadline date</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="participants_date" type="text" length="10">
            <label for="participants_date">Participants announce date</label>
          </div>
        </div>
      </form>
    </div>
</div>
<?php include 'footer.php'; ?>
