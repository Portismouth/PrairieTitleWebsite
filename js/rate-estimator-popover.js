jQuery(document).ready(function($) {
  $('#closingProLetterLeft').popover({
    content: 'Fee required by law to guaranty escrow funds are safe.',
    trigger: 'hover',
    placement: 'left'
  });
  $('#closingProLetterRight').popover({
    content: 'Fee required by law to guaranty escrow funds are safe.',
    trigger: 'hover',
    placement: 'right'
  });
  $('#ilStatePolFeeLeft').popover({
    content:
      'Fee required by the State of Illinois for every title policy issued',
    trigger: 'hover',
    placement: 'left'
  });
  $('#ilStatePolFeeRight').popover({
    content:
      'Fee required by the State of Illinois for every title policy issued',
    trigger: 'hover',
    placement: 'right'
  });
  $('#chainTitleFeeLeft').popover({
    content:
      'Lender requested information that gives all changes in title over the past 24-36 months',
    trigger: 'hover',
    placement: 'left'
  });
  $('#chainTitleFeeRight').popover({
    content:
      'Lender requested information that gives all changes in title over the past 24-36 months',
    trigger: 'hover',
    placement: 'right'
  });
  $('#commitUpdateFeeLeft').popover({
    content: 'Fee for updated property search done prior to closing',
    trigger: 'hover',
    placement: 'left'
  });
  $('#commitUpdateFeeRight').popover({
    content: 'Fee for updated property search done prior to closing',
    trigger: 'hover',
    placement: 'right'
  });
  $('#policyUpdateFeeLeft').popover({
    content:
      'Fee for updated property search done prior to title policy issuance',
    trigger: 'hover',
    placement: 'left'
  });
  $('#policyUpdateFeeRight').popover({
    content:
      'Fee for updated property search done prior to title policy issuance',
    trigger: 'hover',
    placement: 'right'
  });
  $('#recordingFeeBuyer').popover({
    content: 'County fee to record documents such as the deed and mortgage',
    trigger: 'hover',
    placement: 'left'
  });
  $('#recordingFeeSeller').popover({
    content: 'County fee to record Release of Mortgage',
    trigger: 'hover',
    placement: 'right'
  });
});
