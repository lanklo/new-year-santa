$(document).ready(function() {

	$('input[name=get-santa]').click(function(e) {
		e.preventDefault();

		var member_id = $.cookie('member_id');

		if (member_id) {
			getSanta(member_id);
		} else {
			console.log('error');
		}
	});

	$('select[name=members]').change(function(e) {
		$(this).parent().removeClass('has-error');
	});

	$('input[name=choose-me]').click(function(e) {
		e.preventDefault();
		// выбран ли варинт
		var $select = $('select[name=members]');
		var value = parseInt($select.val());

		if (!value) {
			console.log('Значение не выбрано');

			$select.parent().addClass('has-error');
		} else {
			chooseYourself(value);
		}
	});

	function getSanta(member_id) {
		$.ajax({
			url: '/ajax.php?type=santa',
			method: "POST",
			data: {id: member_id},
			dataType: "json"
		}).done(function(data) {

			if (data.santa_id === 'error') {
				console.log('error');
				return false;
			} else {
				$.cookie('santa_id', data.santa_id);
				showSanta(data.santa_id);
				goToTarget('#portfolio');

				return true;
			}
		});
	}

	function showSanta(santa_id) {
		var member = members[santa_id];

		$('.santa-name').text(member.name + ' ' + member.last_name);
		$('.santa-photo').attr('src', member.photo);
	}

	function alreadyVoted() {
		$('.santa-name').text("Вы уже выбирали!");
	}

	function chooseYourself(id) {
		// Проверить голосовал ли уже
		$.ajax({
			url: '/ajax.php?type=choose',
			method: "GET",
			data: {id: id},
			dataType: "json"
		}).done(function(data) {
			if (data.value == 'voted') {
				alreadyVoted();
				goToTarget('#portfolio');
				return false;
			} else {
				$.cookie('member_id', id);
				goToTarget('#services');

				return true;
			}
		});

		// Отправить запрос с установкой id в сессию

		// Ошибка или нет

		// Прокрутка
	}

	function goToTarget(hash) {
		var target = $(hash);

        if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        }
	}
});