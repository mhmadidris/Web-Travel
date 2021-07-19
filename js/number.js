document.addEventListener("DOMContentLoaded", function() {
    var inputs = document.getElementsByClassName("input-number-wrapper");

    function incInputNumber(input, step) {
        var val = +input.value;
        if (isNaN(val)) val = 0;
        val += step;
        input.value = val > 0 ? val : 0;
    }

    Array.prototype.forEach.call(inputs, function(el) {
        var input = el.getElementsByTagName("input")[0];

        el.getElementsByClassName("increase")[0].addEventListener(
            "click",
            function() {
                incInputNumber(input, 1);
            }
        );
        el.getElementsByClassName("decrease")[0].addEventListener(
            "click",
            function() {
                incInputNumber(input, -1);
            }
        );
    });
});