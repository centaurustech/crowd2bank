define([
	'jquery',
	'bootstrap',
], function ($) {

    console.log('Loaded Modal Script');

    var Modal = {
        init: function () {
            this.cacheElements();
            this.bindElements();
        },
        cacheElements: function () {
            this.$modalTrigger = $('[data-modal-trigger]');
            this.$modalWrapper = $('#customModal');
            this.$modalTitle = this.$modalWrapper.find('.modal-title');
            this.$modalBody = this.$modalWrapper.find('.modal-body');
            this.$modalOption = this.$modalWrapper.find('.modal-footer');
        },
        bindElements: function () {
            this.$modalTrigger.on('click', this.lauchModal.bind(this))
        },
        lauchModal: function (e) {
            e.preventDefault();

            this.clearModalData();
            this.setModalData();
            this.showModal();

        },
        clearModalData: function () {
            this.$modalTitle.html('');
            this.$modalBody.html('');
            this.$modalOption.html('');
        },
        showModal: function () {
            this.$modalWrapper.modal('show');
        },
        setModalData: function () {
            var id = this.getDataAttribute().modalId,
                value = this.getDataAttribute().modalValue,
                data = this.getJSONData()[id][value];

                this.$modalTitle.html(data.title);
                this.$modalBody.html(data.body);
                this.$modalOption.html(data.option);
            
        },        
        getDataAttribute: function () {
            var attr = {
                modalId: this.$modalTrigger.data('modal-trigger'),
                modalValue: this.$modalTrigger.data('modal-value')
            };

            return attr;
        },
        getJSONData: function () {
            var data = {
                    project : {
                        'delete' : {
                            title: 'Glass Bread Toaster',
                            body: '<p>Are you sure you want to delete this item?</p>',
                            option: '<button type="button" class="btn btn-default" data-dismiss="modal">No</button>' +
                                    '<button type="button" class="btn btn-primary">Yes</button>',
                        }
                    }
            };

            return data;
        }
    }

    $(document).ready(function(){
        Modal.init();
    });

});
