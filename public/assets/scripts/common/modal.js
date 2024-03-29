define([
	'jquery',
	'bootstrap'
], function ($) {

    console.log('Loaded common/modal.js');

    var Data = {
        load: function () {
            var data = {
                    project : {
                        'delete' : {
                            title: 'Glass Bread Toaster',
                            body: '<p>Are you sure you want to delete this item?</p>',
                            option: '<button type="button" class="btn btn-default" data-dismiss="modal">No</button>' +
                                    '<button type="button" class="btn btn-primary">Yes</button>',
                        }
                    },
                    account: {
                        remove: {
                            title: 'Remove Account',
                            body: '<p>Are you sure you want to remove your account?</p>',
                            option: '<button type="button" class="btn btn-default" data-dismiss="modal">No</button>' +
                                    '<button type="button" class="btn btn-primary">Yes</button>'
                        },
                        scope: {
                            title: 'Member Scope',
                            body: '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur reprehenderit laboriosam expedita, distinctio fugit. Quam nam, amet. Tenetur enim voluptatem repellendus dolore amet doloribus ducimus similique adipisci, placeat cupiditate tempora.</p>',
                            option: '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'
                        }
                    }
            };

            return data;
        }
    };

    var Modal = {
        init: function () {
            this.cacheElements();
            this.bindElements();
        },
        cacheElements: function () {
            this.$modalTrigger = $('[data-modal-trigger]');
            this.$modalWrapper = $('#customModal');
            this.$modalCloseTrigger = this.$modalWrapper.find('[data-dismiss]');
            this.$modalTitle = this.$modalWrapper.find('.modal-title');
            this.$modalBody = this.$modalWrapper.find('.modal-body');
            this.$modalOption = this.$modalWrapper.find('.modal-footer');
        },
        bindElements: function () {
            this.$modalTrigger.on('click', this.lauchModal.bind(this));
            this.$modalWrapper.on('hidden.bs.modal', this.closeModal.bind(this));
        },
        lauchModal: function (e) {
            e.preventDefault();
            
            this.appendModalData(this.setModalData(e));
            this.$modalWrapper.modal('show');
        },
        appendModalData: function (data) {
            this.$modalTitle.html(data.title);
            this.$modalBody.html(data.body);
            this.$modalOption.html(data.option);
        },
        setModalData: function (e) {
            var id = this.getDataAttribute(e).modalId,
                value = this.getDataAttribute(e).modalValue,
                data = Data.load()[id][value];
                return data;            
        },
        getDataAttribute: function (e) {
            var element = $(e.target),
                attr = {
                    modalId: element.data('modal-trigger'),
                    modalValue: element.data('modal-value')
                };

                return attr;
        },
        closeModal: function () {
            this.$modalTitle.html('');
            this.$modalBody.html('');
            this.$modalOption.html('');
        }
    };

    $(document).ready(function(){
        Modal.init();
    });

});
