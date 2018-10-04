//Modal initialization
$(document).on('click', '.trigger-iFrame', function(event) {
  event.preventDefault();
  $('#modal-iFrame').iziModal('open', this); // Do not forget the "this"
});

//Modal options
$("#modal-iFrame").iziModal({
  title: 'Directory Review', //Modal title
  subtitle: 'Here is all of your public information', //Modal subtitle
  fullscreen: true, //Icon to expand modal to fullscreen
  headerColor: 'rgb(204, 0, 0)', //Color of modal header. Hexa colors allowed.
  overlayColor: 'rgba(0, 0, 0, 0.4)', //Color of overlay behind the modal
  iconColor: '',
  iconClass: 'icon-chat',
  iframe: true, //In this example, this flag is mandatory. Izimodal needs to understand you will call an iFrame from here
  iframeURL: "https://www.irha.iastate.edu/directoryReview/testScrape.php" //Link will be opened inside modal
});