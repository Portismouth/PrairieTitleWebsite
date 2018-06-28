jQuery(document).ready(function($) {
  //object containing rate info
  let charges = {
    "il-state-fee": 3,
    buyers: {
      "title-ins": 500,
      "closing-letter": 50,
      "email-fee": 40,
      "ovn-proc-fee": 25,
      "wire-fee": 40,
      "chain-fee": 125,
      "pol-upd-fee": 125,
      "rec-fee": 125,
      "ap-lender-fee": 50
    },
    sellers: {
      "closing-letter": 50,
      "comm-upd-fee": 125,
      "rec-fee": 125,
      "wire-fee": 40
    }
  };
  let count = 0;
  $("#estimator-value").keyup(function(event) {
    event.keyCode === 8 ? count-- : count++;

    //formats as you type
    

    let val = $(this).val();
    let closingFee = 1275;

    //reset amounts if val exceeds 1,000,000
    if (parseInt(val) > 1000000) {
      $("#b-closing-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-title-ins")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-other-total")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-il-state-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-ap-lender-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-closing-letter")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-email-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-ovn-proc-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-wire-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-chain-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-pol-upd-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-rec-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-total")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-title-ins")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-other-total")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-il-state-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-closing-letter")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-wire-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-comm-update-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-rec-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-total")
        .text("$0")
        .css("opacity", 0.5);
      $("#millionModal").modal("toggle");
    } else if (count >= 6) {
      //Grabs Buyer's closing fee
      if (parseInt(val) < 200001) {
        $("#b-closing-fee").text("$" + closingFee);
      }
      if (parseInt(val) > 200000 && parseInt(val) < 250001) {
        closingFee = 1325;
      }
      if (parseInt(val) > 250001 && parseInt(val) < 300001) {
        closingFee = 1350;
      }
      if (parseInt(val) > 300001 && parseInt(val) < 400001) {
        closingFee = 1375;
      }
      if (parseInt(val) > 400001 && parseInt(val) < 500001) {
        closingFee = 1400;
      }
      if (parseInt(val) > 500001) {
        closingFee = 1400;
        for (let n = 500001; n < val; n += 50000) {
          closingFee += 50;
        }
      }
      //Calculates Buyer's Other fee total
      let bOtherSum = 0;
      $("#b-other-total")
        .text(function() {
          for (let amt in charges["buyers"]) {
            if (amt == "title-ins") {
              continue;
            } else {
              bOtherSum += charges["buyers"][amt];
            }
          }
          bOtherSum += parseInt(charges["il-state-fee"]);
          return "$" + bOtherSum;
        })
        .css("opacity", 1);
      //Calculates Sellers Title Insurance
      let insRate = 1700;
      if (val > 200000) {
        for (let n = 200000; n < val; n += 10000) {
          if (n === 500000) {
            insRate += 45;
          } else {
            insRate += 20;
          }
        }
      }
      let sOtherSum = 0;
      $("#s-other-total")
        .text(function() {
          for (let amt in charges["sellers"]) {
            sOtherSum += charges["sellers"][amt];
          }
          sOtherSum += parseInt(charges["il-state-fee"]);
          return "$" + sOtherSum;
        })
        .css("opacity", 1);
      //Individual buyer amounts
      $("#b-closing-fee")
        .text("$" + closingFee.toLocaleString())
        .css("opacity", 1);
      $("input#input_5_3").val("$" + closingFee.toLocaleString());
      $("#b-title-ins")
        .text("$" + charges["buyers"]["title-ins"].toLocaleString())
        .css("opacity", 1);
      $("#b-closing-letter")
        .text("$" + charges["buyers"]["closing-letter"].toLocaleString())
        .css("opacity", 1);
      $("#b-il-state-fee")
        .text("$" + charges["il-state-fee"].toLocaleString())
        .css("opacity", 1);
      $('#b-ap-lender-fee')
        .text('$' + charges["buyers"]["ap-lender-fee"].toLocaleString())
        .css('opacity', 1);
      $("#b-email-fee")
        .text("$" + charges["buyers"]["email-fee"].toLocaleString())
        .css("opacity", 1);
      $("#b-ovn-proc-fee")
        .text("$" + charges["buyers"]["ovn-proc-fee"].toLocaleString())
        .css("opacity", 1);
      $("#b-wire-fee")
        .text("$" + charges["buyers"]["wire-fee"].toLocaleString())
        .css("opacity", 1);
      $("#b-chain-fee")
        .text("$" + charges["buyers"]["chain-fee"].toLocaleString())
        .css("opacity", 1);
      $("#b-pol-upd-fee")
        .text("$" + charges["buyers"]["pol-upd-fee"].toLocaleString())
        .css("opacity", 1);
      $("#b-rec-fee")
        .text("$" + charges["buyers"]["rec-fee"].toLocaleString())
        .css("opacity", 1);
      $("#b-total")
        .text(
          "$" +
            (
              bOtherSum +
              closingFee +
              charges["buyers"]["title-ins"]
            ).toLocaleString()
        )
        .css("opacity", 1); //Individiual seller amounts
      $("#s-title-ins")
        .text("$" + insRate.toLocaleString())
        .css("opacity", 1);
      $("input#input_5_17").val("$" + insRate.toLocaleString());
      $("#s-other-total")
        .text("$" + sOtherSum.toLocaleString())
        .css("opacity", 1);
      $("#s-il-state-fee")
        .text("$" + charges["il-state-fee"].toLocaleString())
        .css("opacity", 1);
      $("#s-closing-letter")
        .text("$" + charges["sellers"]["closing-letter"].toLocaleString())
        .css("opacity", 1);
      $("#s-comm-update-fee")
        .text("$" + charges["sellers"]["comm-upd-fee"].toLocaleString())
        .css("opacity", 1);
      $("#s-wire-fee")
        .text("$" + charges["sellers"]["wire-fee"].toLocaleString())
        .css("opacity", 1);
      $("#s-rec-fee")
        .text("$" + charges["sellers"]["rec-fee"].toLocaleString())
        .css("opacity", 1);
      $("#s-total")
        .text("$" + (insRate + sOtherSum).toLocaleString())
        .css("opacity", 1);
    } else if (count < 6) {
      //reset amounts if field is cleared
      $("#b-closing-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-title-ins")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-other-total")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-il-state-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-ap-lender-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-closing-letter")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-email-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-ovn-proc-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-wire-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-chain-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-pol-upd-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-rec-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#b-total")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-title-ins")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-other-total")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-il-state-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-wire-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-closing-letter")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-comm-update-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-rec-fee")
        .text("$0")
        .css("opacity", 0.5);
      $("#s-total")
        .text("$0")
        .css("opacity", 0.5);
    }
  });
});
