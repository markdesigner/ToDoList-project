<?php include('header.php') ?>
<?php include('data.php') ?>
	
<div id="panel">
	<h1>好用的代辦事項清單</h1>

	<div id="todo-list">
		<ul>
			<li class="new">
				<div class="checkbox"></div>
				<div class="content" contenteditable="true"></div>
			</li>
		</ul>
	</div>
</div>

<script id="todo-list-item-template" type="text/x-handlebars-template">
	<li data-id="{{id}}" class="{{#if is_complete}}complete{{/if}}">
		<div class="checkbox"></div>
		<div class="content">{{content}}</div>
		<div class="actions">
			<div class="delete">x</div>
		</div>
	</li>
</script>
	
<?php include('footer.php') ?>
<!-- 現在我在這邊寫一些註解然後我要推上去github

  -->

<script src="https://www.gstatic.com/firebasejs/5.8.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDVcZxBW1ztV_zusoXDoVZvcU8dz28K82s",
    authDomain: "myweb-9ed5b.firebaseapp.com",
    databaseURL: "https://myweb-9ed5b.firebaseio.com",
    projectId: "myweb-9ed5b",
    storageBucket: "",
    messagingSenderId: "386483554497"
  };
  firebase.initializeApp(config);
</script>