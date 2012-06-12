var receiptHelper = function(){
	
	this.fillMissing = function(event) {

		var receipt_total = Number($('#Receipt_total').val());
		var receipt_goods = Number($('#Receipt_goods').val());

		switch(event.target.id) {
			case 'Receipt_total':
				var total = receipt_total / ((20/100) +1);
				$('#Receipt_goods').val(total.toFixed(2));
				break;
			case 'Receipt_goods':
				var total = receipt_goods + (receipt_goods/100 * 20);
				$('#Receipt_total').val(total.toFixed(2));
				break;
		};
		
		var receipt_total = Number($('#Receipt_total').val());
		var receipt_goods = Number($('#Receipt_goods').val());
		var total = receipt_total - receipt_goods;
		$('#Receipt_vat').val(total.toFixed(2));

	};
};

var rh = new receiptHelper;

$(function() {
	$('#Receipt_total').change(function(e) {
			rh.fillMissing(e);
		});
	$('#Receipt_goods').change(function(e) {
		rh.fillMissing(e);
	});
});
