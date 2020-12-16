<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
		<div id="app">
			{{data}}
		</div>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
		crossorigin="anonymous">
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
		crossorigin="anonymous">
		</script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
		crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
		<script>
		
			var template_url = "./loginComponent.html";
			
			function loadRegister() {
				template_url = "./registerComponent.html";
				fetch(template_url)
					.then(response => response.text())
					.then(template => {
						let compiled_template = Vue.compile(template);
						var vm = new Vue({
							el: '#app',
							render: compiled_template.render,
							staticRenderFns: compiled_template.staticRenderFns,
							data: {
								//test: ""
							},
						});
					});
			}

			function loadReset() {
				template_url = "./passwordResetComponent.html";
				fetch(template_url)
					.then(response => response.text())
					.then(template => {
						let compiled_template = Vue.compile(template);
						var vm = new Vue({
							el: '#app',
							render: compiled_template.render,
							staticRenderFns: compiled_template.staticRenderFns,
							data: {
								//test: ""
							},
						});
					});
			}			

			fetch(template_url)
				.then(response => response.text())
				.then(template => {
					let compiled_template = Vue.compile(template);
					var vm = new Vue({
						el: '#app',
						render: compiled_template.render,
						staticRenderFns: compiled_template.staticRenderFns,
						data: {
							//test: ""
						},
						methods: {
							handleRegister: function(){
								this.$destroy();
								$(vm.$el).remove();
								vm = null;
								let element = document.createElement("div");
								element.setAttribute("id", "app");
								document.body.appendChild(element);
								loadRegister();
							},
							handleReset: function(){
								this.$destroy();
								$(vm.$el).remove();
								vm = null;
								let element = document.createElement("div");
								element.setAttribute("id", "app");
								document.body.appendChild(element);
								loadReset();
							}
						}
					});
				});
		</script>
	</body>
</html>
