var KTAutosize = {
    init: function () {
        var t, i;
        t = $(".kt_autosize_1"), i = $("#kt_autosize_2"), autosize(t), autosize(i), autosize.update(i)
    }
};
jQuery(document).ready(function () {
    KTAutosize.init()
});
