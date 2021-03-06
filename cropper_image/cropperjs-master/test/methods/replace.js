QUnit.test('methods#replace', function (assert) {
  var done = assert.async();
  var util = window.Util;
  var image = util.createImage();

  assert.expect(1);

  return new Cropper(image, {
    ready: function () {
      var cropper = this.cropper;

      cropper.options.ready = function () {
        assert.ok(true);
        done();
      };

      cropper.replace('../assets/img/picture-2.jpg');
    }
  });
});
