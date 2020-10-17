
// function customTokenizer(datum) { return datum.keywords; }

var CDN_js = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  remote: {
    url: "https://api.cdnjs.com/libraries?fields=keywords&search=%QUERY",
    wildcard: '%QUERY',
    filter: function(response) {   
      var filteredJavaScriptResults = _.filter(response.results, function(item) {
        if (/.js$/.test(item.latest)) {
          return item.latest;
        } else {
          return false;
        }
      })
      return filteredJavaScriptResults;
    }
  }
});

var CDN_css = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  remote: {
    url: "https://api.cdnjs.com/libraries?fields=keywords&search=%QUERY",
    wildcard: '%QUERY',
    filter: function(response) {   
      var filteredJavaScriptResults = _.filter(response.results, function(item) {
        if (/.css$/.test(item.latest)) {
          return item.latest;
        } else {
          return 0;
        }
      })
      return filteredJavaScriptResults;
    }
  }
});

$('.typeahead-js').typeahead({
  minLength: 3,
  highlight: true
}, {
  name: 'name',
  source: CDN_js,
  templates: {
    // header: '<h3>JavaScript Search Results</h3>',
    suggestion: function(item) {
      return '<p>' + item.name + '<small>' + item.latest + '</small>' + '</p>';
    }
  },
  display: function(item) {
    return item.latest;
  }
});

$('.typeahead-css').typeahead({
  minLength: 3,
  highlight: true
}, {
  name: 'name',
  source: CDN_css,
  templates: {
    suggestion: function(item) {
      return '<p>' + item.name + '<small>' + item.latest + '</small>' + '</p>';
    }
  },
  display: function(item) {
    return item.latest;
  }
});