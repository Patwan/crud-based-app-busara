window.Parsley.addValidator('phone', {
  validateString: function(value) {
    return true == (/^\+(?:[0-9]●?){6,14}[0-9]$/.test(value));
  },
  messages: {
    en: 'International format allowed only eg +254*********'
  }
});