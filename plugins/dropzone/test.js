addedfile: function addedfile(file) {
    var _this2 = this;

    if (this.element === this.previewsContainer) {
        this.element.classList.add("dz-started");
    }

    if (this.previewsContainer) {
        file.previewElement = Dropzone.createElement(this.options.previewTemplate.trim());
        file.previewTemplate = file.previewElement; // Backwards compatibility

        this.previewsContainer.appendChild(file.previewElement);

        var _iterator3 = _createForOfIteratorHelper(file.previewElement.querySelectorAll("[data-dz-name]")),
            _step3;

        try {
            for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
                var node = _step3.value;
                node.textContent = file.name;
            }
        } catch (err) {
            _iterator3.e(err);
        } finally {
            _iterator3.f();
        }

        var _iterator4 = _createForOfIteratorHelper(file.previewElement.querySelectorAll("[data-dz-size]")),
            _step4;

        try {
            for (_iterator4.s(); !(_step4 = _iterator4.n()).done;) {
                node = _step4.value;
                node.innerHTML = this.filesize(file.size);
            }
        } catch (err) {
            _iterator4.e(err);
        } finally {
            _iterator4.f();
        }

        if (this.options.addRemoveLinks) {
            file._removeLink = Dropzone.createElement("<a class=\"dz-remove\" href=\"javascript:undefined;\" data-dz-remove>".concat(this.options.dictRemoveFile, "</a>"));
            file.previewElement.appendChild(file._removeLink);
        }


        if (this.options.addReviewLinks) {
            file._previewLink = Dropzone.createElement("<a class=\"dz\" data-bs-target=\"#preview\">" + "</a>"));
        file.previewElement.appendChild(file._previewLink);
    }

    var removeFileEvent = function removeFileEvent(e) {
        e.preventDefault();
        e.stopPropagation();

        if (file.status === Dropzone.UPLOADING) {
            return Dropzone.confirm(_this2.options.dictCancelUploadConfirmation, function() {
                return _this2.removeFile(file);
            });
        } else {
            if (_this2.options.dictRemoveFileConfirmation) {
                return Dropzone.confirm(_this2.options.dictRemoveFileConfirmation, function() {
                    return _this2.removeFile(file);
                });
            } else {
                return _this2.removeFile(file);
            }
        }
    };

    var _iterator5 = _createForOfIteratorHelper(file.previewElement.querySelectorAll("[data-dz-remove]")),
        _step5;

    try {
        for (_iterator5.s(); !(_step5 = _iterator5.n()).done;) {
            var removeLink = _step5.value;
            removeLink.addEventListener("click", removeFileEvent);
        }
    } catch (err) {
        _iterator5.e(err);
    } finally {
        _iterator5.f();
    }
}
}