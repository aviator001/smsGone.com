			var timx
			var op = 0
			var y_axis = 1
			var toast = []
			var dismissed = 0
			var my_mobile = ""
			setTimeout('get_messages()', 100)

			function check_new_messages() {
				var url = 'x_sms_get_new_messages.php?mobile=' + my_mobile + '&rjs=' + Math.random() * 1000000000000000000000
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if (msg.trim() != '') {
									toast = document.getElementById('toast')
									toast.innerHTML = msg
									toast.style.display = 'block'
									toast.style.opacity = op
									toast.style.position = 'absolute'
									toast.style.zIndex = '9999999999'
									toast.style.top = '0px'
									show_box()
									setTimeout('hide_box()', 10000)
						} 
							setTimeout('check_new_messages()', 30000)
					}
				})
			}
			
			function show_box() {
				if (op < 1) {
					op = op + 0.05
					if (y_axis < 100) {
						y_axis = y_axis + 1
						toast.style.top = y_axis + 'px'
					} 
					toast.style.opacity = op
					
					timx = setTimeout('show_box()', 10)
				} else {
					clearTimeout(timx)
					op = 1
					y_axis = 0
				}
			 }
			
			function hide_box() {
				if (op > 0) {
					op = op - 0.01
					toast.style.opacity = op
					timx = setTimeout('hide_box()', 10)
				} else {
					clearTimeout(timx)
				}
			 }
			
			function dismiss(obj) {
				obj.style.display = 'none'
				dismissed = 1
			}
			