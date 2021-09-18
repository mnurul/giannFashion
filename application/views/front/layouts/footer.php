<!-- FOOTER -->
<footer>
	<!-- FOOTER TOP -->
	<!--  -->
	<!-- /FOOTER TOP -->

	<!-- FOOTER BOTTOM -->
	<div id="footer-bottom-wrap">
		<div id="footer-bottom">
			<div class="container mt-3">
				<div class="row">
					<div class="col-md-4 mt-3">
						<h4 style="color: whitesmoke;"><strong> GIANT FASHION</strong></h4>
						<p>Sebagai Pusat Fashion Online di Asia, kami menciptakan kemungkinan-kemungkinan gaya tanpa batas dengan cara memperluas jangkauan produk, mulai dari produk internasional hingga produk lokal dambaan.</p>
					</div>
					<div class="col-md-4 mt-3">
						<h4 style="color: whitesmoke;"><strong>Detail</strong></h4>
						<p>Telp : 08979401951</br>Alamat : Jl. Pramuka No. 9, Marga Jaya, Kota Bekasi</br>Waktu : Senin – Sabtu l 09.00 – 16.30</p>
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>


		</div>
	</div>
	<!-- /FOOTER BOTTOM -->
</footer>
<!-- /FOOTER -->

<div class="shadow-film closed"></div>

<!-- SVG ARROW -->
<svg style="display: none;">
	<symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
		<path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
				L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z" />
	</symbol>
</svg>
<!-- /SVG ARROW -->

<!-- SVG STAR -->
<svg style="display: none;">
	<symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">
		<polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751 
		2.495,6.313 -0.002,3.878 3.45,3.376 " />
	</symbol>
</svg>
<!-- /SVG STAR -->

<!-- SVG PLUS -->
<svg style="display: none;">
	<symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
		<rect x="5" width="3" height="13" />
		<rect y="5" width="13" height="3" />
	</symbol>
</svg>
<!-- /SVG PLUS -->

<!-- jQuery -->
<!-- <script src="<?php echo base_url('assets/') ?>js/vendor/jquery-3.1.0.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
<!-- Tooltipster -->
<script src="<?php echo base_url('assets/') ?>js/vendor/jquery.tooltipster.min.js"></script>
<!-- Owl Carousel -->
<script src="<?php echo base_url('assets/') ?>js/vendor/owl.carousel.min.js"></script>
<!-- Tweet -->
<!-- <script src="<?php echo base_url('assets/') ?>js/vendor/twitter/jquery.tweet.min.js"></script> -->
<!-- xmAlerts -->
<!-- <script src="<?php echo base_url('assets/') ?>js/vendor/jquery.xmalert.min.js"></script> -->
<!-- Side Menu -->
<script src="<?php echo base_url('assets/') ?>js/side-menu.js"></script>
<!-- Home -->
<script src="<?php echo base_url('assets/') ?>js/home.js"></script>
<!-- Tooltip -->
<script src="<?php echo base_url('assets/') ?>js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="<?php echo base_url('assets/') ?>js/user-board.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- Home Alerts -->
<!-- <script src="<?php echo base_url('assets/') ?>js/home-alerts.js"></script> -->
<!-- Footer -->
<!-- <script src="<?php echo base_url('assets/') ?>js/footer.js"></script> -->


<script type="text/javascript">
	$(document).ready(function() {

		$('#example').DataTable();
		$("#tmbl-pesan").click(function(e) {
			$("#form-pesanan").slideToggle('slow');
			e.preventDefault();
		});

		$("#province").on('change', function() {
			var province = $(this).val();
			console.log(province);

			// $.post('<?= base_url(); ?>Produk/city', {
			// 	key1: province
			// }, function(result) {
			// 	alert('successfully posted key1=value1&key2=value2 to foo.php');
			// });
			$.post("<?= base_url(); ?>produk/city?province=" + province, $("form").serialize(), function(hasil) {
				alert('successfully posted key1=value1&key2=value2 to foo.php');

			});
		});

		$("#qty").on('change', function() {

			var harga = $('#harga').val();
			// var bahan = $('#bahan').val();
			var ongkos = $('#ongkos').val();
			var qty = $(this).val();

			console.log("harga1 " + harga);
			console.log("ongkos1 " + ongkos);
			// console.log("bahan " + bahan);
			console.log("qty1 " + qty);


			// var subtotal = harga * qty;
			// var subBahan = bahan * qty;
			// var subtotal = (bahan * qty) + (harga * qty);
			// var subtotal = qty;
			// var subtotal2 = subtotal + ongkos;
			// var subtotal = parseInt(harga) * qty;
			var subtotal = (parseInt(harga) * qty) + parseInt(ongkos);

			console.log("total1 " + subtotal);


			$("#subtotal").text(formatNumber(subtotal));

			var weight;
			if (qty <= 5) {
				weight = 1000;
			} else if ((qty >= 5) && (qty <= 10)) {
				weight = 2000;
			} else if ((qty >= 10) && (qty <= 15)) {
				weight = 3000;
			} else if ((qty >= 20) && (qty <= 25)) {
				weight = 4000;
			} else if ((qty >= 25) && (qty <= 30)) {
				weight = 5000;
			}
			document.getElementById("weight").value = weight;
		});

		$("#ongkos").on('change', function() {
			var ongkos = $(this).val();
			var harga = $('#harga').val();
			// var bahan = $('#bahan').val();
			var qty = $('#qty').val();
			var subtotal = $('#subtotal').val();
			console.log("harga " + harga);
			console.log("ongkos " + ongkos);
			// console.log("bahan " + bahan);
			console.log("qty " + qty);
			console.log("total " + subtotal);


			// var subtotal = ((bahan * qty) + (harga * qty)) + parseInt(ongkos);
			// var subtotal = (harga * qty) + parseInt(ongkos);
			// var subtotal = (parseInt(harga) * qty) + parseInt(ongkos);
			console.log("main harga " + ((bahan * qty) + (harga * qty)));
			var subtotal2 = subtotal + ongkos;
			console.log("total " + subtotal2);
			$("#subtotal").text(formatNumber(subtotal2));
			// document.getElementById("subtotal").innerHTML = "subtotal";
			alert(subtotal2);
			document.getElementById("subtotal").textContent = subtotal2;
			document.getElementById("subtotal").value = subtotal2;

		});







		function formatNumber(num) {
			return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
		}
	});
</script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>