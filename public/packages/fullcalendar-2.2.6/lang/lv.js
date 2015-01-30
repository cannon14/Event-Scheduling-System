(function (e) {
    "function" == typeof define && define.amd ? define(["jquery", "moment"], e) : e(jQuery, moment)
})(function (e, t) {
    function n(e, t, n) {
        var r = e.split("_");
        return n ? 1 === t % 10 && 11 !== t ? r[2] : r[3] : 1 === t % 10 && 11 !== t ? r[0] : r[1]
    }

    function r(e, t, r) {
        return e + " " + n(i[r], e, t)
    }

    var i = {
        mm: "minūti_minūtes_minūte_minūtes",
        hh: "stundu_stundas_stunda_stundas",
        dd: "dienu_dienas_diena_dienas",
        MM: "mēnesi_mēnešus_mēnesis_mēneši",
        yy: "gadu_gadus_gads_gadi"
    };
    (t.defineLocale || t.lang).call(t, "lv", {
        months: "janvāris_februāris_marts_aprīlis_maijs_jūnijs_jūlijs_augusts_septembris_oktobris_novembris_decembris".split("_"),
        monthsShort: "jan_feb_mar_apr_mai_jūn_jūl_aug_sep_okt_nov_dec".split("_"),
        weekdays: "svētdiena_pirmdiena_otrdiena_trešdiena_ceturtdiena_piektdiena_sestdiena".split("_"),
        weekdaysShort: "Sv_P_O_T_C_Pk_S".split("_"),
        weekdaysMin: "Sv_P_O_T_C_Pk_S".split("_"),
        longDateFormat: {
            LT: "HH:mm",
            LTS: "LT:ss",
            L: "DD.MM.YYYY",
            LL: "YYYY. [gada] D. MMMM",
            LLL: "YYYY. [gada] D. MMMM, LT",
            LLLL: "YYYY. [gada] D. MMMM, dddd, LT"
        },
        calendar: {
            sameDay: "[Šodien pulksten] LT",
            nextDay: "[Rīt pulksten] LT",
            nextWeek: "dddd [pulksten] LT",
            lastDay: "[Vakar pulksten] LT",
            lastWeek: "[Pagājušā] dddd [pulksten] LT",
            sameElse: "L"
        },
        relativeTime: {
            future: "%s vēlāk",
            past: "%s agrāk",
            s: "dažas sekundes",
            m: "minūti",
            mm: r,
            h: "stundu",
            hh: r,
            d: "dienu",
            dd: r,
            M: "mēnesi",
            MM: r,
            y: "gadu",
            yy: r
        },
        ordinalParse: /\d{1,2}\./,
        ordinal: "%d.",
        week: {dow: 1, doy: 4}
    }), e.fullCalendar.datepickerLang("lv", "lv", {
        closeText: "Aizvērt",
        prevText: "Iepr.",
        nextText: "Nāk.",
        currentText: "Šodien",
        monthNames: ["Janvāris", "Februāris", "Marts", "Aprīlis", "Maijs", "Jūnijs", "Jūlijs", "Augusts", "Septembris", "Oktobris", "Novembris", "Decembris"],
        monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jūn", "Jūl", "Aug", "Sep", "Okt", "Nov", "Dec"],
        dayNames: ["svētdiena", "pirmdiena", "otrdiena", "trešdiena", "ceturtdiena", "piektdiena", "sestdiena"],
        dayNamesShort: ["svt", "prm", "otr", "tre", "ctr", "pkt", "sst"],
        dayNamesMin: ["Sv", "Pr", "Ot", "Tr", "Ct", "Pk", "Ss"],
        weekHeader: "Ned.",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: !1,
        showMonthAfterYear: !1,
        yearSuffix: ""
    }), e.fullCalendar.lang("lv", {
        defaultButtonText: {
            month: "Mēnesis",
            week: "Nedēļa",
            day: "Diena",
            list: "Dienas kārtība"
        }, allDayText: "Visu dienu", eventLimitText: function (e) {
            return "+vēl " + e
        }
    })
});