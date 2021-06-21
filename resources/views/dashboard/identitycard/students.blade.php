@extends('dashboard.layouts.dashboard')
@section('title', 'Student identity cards generator')
@section('dashboard')
    <style>
        .break-data{page-break-before:always}
        .card-container{
            padding: 1rem;

        }
        .card-logo-container{
            display: flex;
            justify-content: space-between;
            color: white;
        }
        .card-logo {
            border-radius: .4rem;
            width: 4.5rem;
            margin-right: 1.5rem;
            margin-left: 1.2rem;
        }
        .card-logo-header{
            margin-top: .2rem;
        }
        .card-logo-header > h1{
            font-weight: 500;
            font-size: 2rem;
            /*margin-bottom: 0;*/
        }
        .card-logo-header > div{
            /*font-size: 1.1rem;*/
            color: #0b0b0b;
        }
        .card-background{
            border-radius: 4px;
            position: relative;
            background: url('{{ asset("storage/school-2/identity_card-front-image.png") }}') center center no-repeat;
            background-size: 100%;
            background-position: top center;
            width: 100%;
        }
        .card-address{
            text-align: center;
            padding-left: 8rem;
            line-height: 90%;
        }
        .card-address > span{
            font-size: .9rem;
        }
        .card-img-container{

            overflow: hidden;
        }
        .card-img-container > img {
            width: 136px;
            height: 159px;
            margin-top: 1.2rem;
            border: 2px solid #2F366A;
            border-radius: 8px;
        }
        .card-user-name{
            margin-top: 6%;
            margin-left: 4%;
        }
        .card-user-name p{
            font-size: 1rem;
            margin-bottom: .4rem;
        }
        .card-qrcode{
            width: 4.5rem;
            overflow: hidden;
            position: absolute;
            right: 1rem;
            bottom: 1rem;
        }
        .qrcode{
            max-width: 100%;
            height: auto;
        }
        .qrcode-back{
            width: 10rem;
            overflow: hidden;
            margin-left: 1rem;
        }
        .card-container.qrcode-back-outline{
            border-radius: 4px;
            border: 2px solid rgba(0,0,0, .1);
        }
        hr.solid {
            border-top: 2px solid #999;
            margin-bottom: 0;
            margin-top: 0;
        }


        hr.hr-text {
            position: relative;
            border: none;
            height: 1px;
            background: #999;
        }

        hr.hr-text::before {
            content: attr(data-content);
            display: inline-block;
            background: #fff;
            font-weight: bold;
            font-size: 0.85rem;
            color: #999;
            border-radius: 30rem;
            padding: 0.2rem 2rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .card-signature{
            position: absolute;
            touch-action: none;
            bottom: 1.2rem;
            right: 5rem;
        }
        .pb-card{
            /*padding-bottom: 3.7rem;*/
        }
        .mr-3.text-center{
            margin-top: 2.6rem;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-12" >
            <div class="card" >
                <div class="card-body " id="identity-card">
                    <div class="row">
                    @forelse($users as $key => $user)
                            <div class="col-lg-6 col-md-6 mb-1">
                                <div class="card-background">
                                    <div class="card-container">
                                        <div class="card-logo-container">
                                            <img class="img-fluid card-logo" src="{{ asset("storage/".$user->school->result_logo) }}">
                                            <div class="card-logo-header">
                                                <h1>{{ \Illuminate\Support\Str::upper($user->school->school_name) }}</h1>
                                                <div class="card-address"><span>{{ \Illuminate\Support\Str::upper($user->school->address) }}</span></div>
                                            </div>
                                        </div>
                                        <div class="d-flex ">
                                            <div class="card-img-container">
                                                <img src="{{ asset('storage/'.$user->photo) }}" />
                                            </div>
                                            <div class="card-user-name">
                                                <h3>{{ \Illuminate\Support\Str::upper($user->longname) }}</h3>
                                                <div class="">
                                                    <p><span>Reg No: </span>{{ $user->school->school_name_code.'-'.$user->code }}</p>
                                                    <p><span>Issue Date:</span> {{ Carbon\Carbon::now()->format('F j, Y') }}</p>
                                                    @if($user->studentInfo->section->classes->name)
                                                    <p><span>Expiry Date:</span> {{ Carbon\Carbon::now()->addYears(cardExpiry($user->studentInfo->section->classes->name))->format('F j, Y') }}</p>
                                                        @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-qrcode">
                                            <img class="card-img-top img-fluid qrcode" src="data:image/svg+xml;base64,{!! base64_encode(QrCode::format('svg')->generate($user->code)) !!}"
                                                 alt="{{ $user->fullname }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-1">
                                <div class="card-container qrcode-back-outline d-flex justify-content-between text-center pt-4">
                                    <div class="qrcode-back d-flex align-items-center justify-content-center">
                                        <img class="card-img-top img-fluid qrcode" src="data:image/svg+xml;base64,{!! base64_encode(QrCode::format('svg')->generate($user->code)) !!}"
                                             alt="{{ $user->fullname }}">
                                    </div>
                                    <div class="position-relative">
                                        <h6>This card is the property of</h6>
                                        <img class="img-fluid card-logo" src="{{ asset('storage/'.$user->school->result_logo) }}">
                                        <h5>{{ \Illuminate\Support\Str::title($user->school->school_name) }}</h5>
                                        <h6 class="pl-5 pr-5 pb-card">If found please return to the Management</h6>
                                        <div class=" pl-5 pr-5 ml-3 mr-3 text-center"  >
                                            <canvas class="canvas text-uppercase card-signature" id="principal-board-{{ $key }}" style="width: 50%"></canvas>
                                            <hr class="solid">
                                            <p>Authorized Signature</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                <!-- Card -->
                    @empty
                        <p>No data</p>
                    @endforelse
                    </div>
                </div>
            </div>
            {{ $users->links() }}
            <!-- Row -->
        </div>
        <div class="col-12">
            <div class="form-group row mb-0">
                <div class="col-md-12 offset-md-10 ">
                    <button type="submit" class="btn btn-outline-dark" id="download">
                        {{ __('Download') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="principal" data-principal="{{ $principal->signature }}"></div>
</div>


@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        /*!
* Signature Pad v2.3.2
* https://github.com/szimek/signature_pad
*
* Copyright 2017 Szymon Nowak
* Released under the MIT license
*
* The main idea and some parts of the code (e.g. drawing variable width Bézier curve) are taken from:
* http://corner.squareup.com/2012/07/smoother-signatures.html
*
* Implementation of interpolation using cubic Bézier curves is taken from:
* http://benknowscode.wordpress.com/2012/09/14/path-interpolation-using-cubic-bezier-and-control-point-estimation-in-javascript
*
* Algorithm for approximated length of a Bézier curve is taken from:
* http://www.lemoda.net/maths/bezier-length/index.html
*
*/

        (function (global, factory) {
            typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
                typeof define === 'function' && define.amd ? define(factory) :
                    (global.SignaturePad = factory());
        }(this, (function () { 'use strict';

            function Point(x, y, time) {
                this.x = x;
                this.y = y;
                this.time = time || new Date().getTime();
            }

            Point.prototype.velocityFrom = function (start) {
                return this.time !== start.time ? this.distanceTo(start) / (this.time - start.time) : 1;
            };

            Point.prototype.distanceTo = function (start) {
                return Math.sqrt(Math.pow(this.x - start.x, 2) + Math.pow(this.y - start.y, 2));
            };

            Point.prototype.equals = function (other) {
                return this.x === other.x && this.y === other.y && this.time === other.time;
            };

            function Bezier(startPoint, control1, control2, endPoint) {
                this.startPoint = startPoint;
                this.control1 = control1;
                this.control2 = control2;
                this.endPoint = endPoint;
            }

// Returns approximated length.
            Bezier.prototype.length = function () {
                var steps = 10;
                var length = 0;
                var px = void 0;
                var py = void 0;

                for (var i = 0; i <= steps; i += 1) {
                    var t = i / steps;
                    var cx = this._point(t, this.startPoint.x, this.control1.x, this.control2.x, this.endPoint.x);
                    var cy = this._point(t, this.startPoint.y, this.control1.y, this.control2.y, this.endPoint.y);
                    if (i > 0) {
                        var xdiff = cx - px;
                        var ydiff = cy - py;
                        length += Math.sqrt(xdiff * xdiff + ydiff * ydiff);
                    }
                    px = cx;
                    py = cy;
                }

                return length;
            };

            /* eslint-disable no-multi-spaces, space-in-parens */
            Bezier.prototype._point = function (t, start, c1, c2, end) {
                return start * (1.0 - t) * (1.0 - t) * (1.0 - t) + 3.0 * c1 * (1.0 - t) * (1.0 - t) * t + 3.0 * c2 * (1.0 - t) * t * t + end * t * t * t;
            };

            /* eslint-disable */

// http://stackoverflow.com/a/27078401/815507
            function throttle(func, wait, options) {
                var context, args, result;
                var timeout = null;
                var previous = 0;
                if (!options) options = {};
                var later = function later() {
                    previous = options.leading === false ? 0 : Date.now();
                    timeout = null;
                    result = func.apply(context, args);
                    if (!timeout) context = args = null;
                };
                return function () {
                    var now = Date.now();
                    if (!previous && options.leading === false) previous = now;
                    var remaining = wait - (now - previous);
                    context = this;
                    args = arguments;
                    if (remaining <= 0 || remaining > wait) {
                        if (timeout) {
                            clearTimeout(timeout);
                            timeout = null;
                        }
                        previous = now;
                        result = func.apply(context, args);
                        if (!timeout) context = args = null;
                    } else if (!timeout && options.trailing !== false) {
                        timeout = setTimeout(later, remaining);
                    }
                    return result;
                };
            }

            function SignaturePad(canvas, options) {
                var self = this;
                var opts = options || {};

                this.velocityFilterWeight = opts.velocityFilterWeight || 0.7;
                this.minWidth = opts.minWidth || 0.5;
                this.maxWidth = opts.maxWidth || 2.5;
                this.throttle = 'throttle' in opts ? opts.throttle : 16; // in miliseconds
                this.minDistance = 'minDistance' in opts ? opts.minDistance : 5;

                if (this.throttle) {
                    this._strokeMoveUpdate = throttle(SignaturePad.prototype._strokeUpdate, this.throttle);
                } else {
                    this._strokeMoveUpdate = SignaturePad.prototype._strokeUpdate;
                }

                this.dotSize = opts.dotSize || function () {
                    return (this.minWidth + this.maxWidth) / 2;
                };
                this.penColor = opts.penColor || 'black';
                this.backgroundColor = opts.backgroundColor || 'rgba(0,0,0,0)';
                this.onBegin = opts.onBegin;
                this.onEnd = opts.onEnd;

                this._canvas = canvas;
                this._ctx = canvas.getContext('2d');
                this.clear();

                // We need add these inline so they are available to unbind while still having
                // access to 'self' we could use _.bind but it's not worth adding a dependency.
                this._handleMouseDown = function (event) {
                    if (event.which === 1) {
                        self._mouseButtonDown = true;
                        self._strokeBegin(event);
                    }
                };

                this._handleMouseMove = function (event) {
                    if (self._mouseButtonDown) {
                        self._strokeMoveUpdate(event);
                    }
                };

                this._handleMouseUp = function (event) {
                    if (event.which === 1 && self._mouseButtonDown) {
                        self._mouseButtonDown = false;
                        self._strokeEnd(event);
                    }
                };

                this._handleTouchStart = function (event) {
                    if (event.targetTouches.length === 1) {
                        var touch = event.changedTouches[0];
                        self._strokeBegin(touch);
                    }
                };

                this._handleTouchMove = function (event) {
                    // Prevent scrolling.
                    event.preventDefault();

                    var touch = event.targetTouches[0];
                    self._strokeMoveUpdate(touch);
                };

                this._handleTouchEnd = function (event) {
                    var wasCanvasTouched = event.target === self._canvas;
                    if (wasCanvasTouched) {
                        event.preventDefault();
                        self._strokeEnd(event);
                    }
                };

                // Enable mouse and touch event handlers
                this.on();
            }

// Public methods
            SignaturePad.prototype.clear = function () {
                var ctx = this._ctx;
                var canvas = this._canvas;

                ctx.fillStyle = this.backgroundColor;
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                this._data = [];
                this._reset();
                this._isEmpty = true;
            };

            SignaturePad.prototype.fromDataURL = function (dataUrl) {
                var _this = this;

                var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

                var image = new Image();
                var ratio = options.ratio || window.devicePixelRatio || 1;
                var width = options.width || this._canvas.width / ratio;
                var height = options.height || this._canvas.height / ratio;

                this._reset();
                image.src = dataUrl;
                image.onload = function () {
                    _this._ctx.drawImage(image, 0, 0, width, height);
                };
                this._isEmpty = false;
            };

            SignaturePad.prototype.toDataURL = function (type) {
                var _canvas;

                switch (type) {
                    case 'image/svg+xml':
                        return this._toSVG();
                    default:
                        for (var _len = arguments.length, options = Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
                            options[_key - 1] = arguments[_key];
                        }

                        return (_canvas = this._canvas).toDataURL.apply(_canvas, [type].concat(options));
                }
            };

            SignaturePad.prototype.on = function () {
                this._handleMouseEvents();
                this._handleTouchEvents();
            };

            SignaturePad.prototype.off = function () {
                this._canvas.removeEventListener('mousedown', this._handleMouseDown);
                this._canvas.removeEventListener('mousemove', this._handleMouseMove);
                document.removeEventListener('mouseup', this._handleMouseUp);

                this._canvas.removeEventListener('touchstart', this._handleTouchStart);
                this._canvas.removeEventListener('touchmove', this._handleTouchMove);
                this._canvas.removeEventListener('touchend', this._handleTouchEnd);
            };

            SignaturePad.prototype.isEmpty = function () {
                return this._isEmpty;
            };

// Private methods
            SignaturePad.prototype._strokeBegin = function (event) {
                this._data.push([]);
                this._reset();
                this._strokeUpdate(event);

                if (typeof this.onBegin === 'function') {
                    this.onBegin(event);
                }
            };

            SignaturePad.prototype._strokeUpdate = function (event) {

                var x = event.clientX;
                var y = event.clientY;

                var point = this._createPoint(x, y);
                var lastPointGroup = this._data[this._data.length - 1];
                var lastPoint = lastPointGroup && lastPointGroup[lastPointGroup.length - 1];
                var isLastPointTooClose = lastPoint && point.distanceTo(lastPoint) < this.minDistance;

                // Skip this point if it's too close to the previous one
                if (!(lastPoint && isLastPointTooClose)) {
                    var _addPoint = this._addPoint(point),
                        curve = _addPoint.curve,
                        widths = _addPoint.widths;

                    if (curve && widths) {
                        this._drawCurve(curve, widths.start, widths.end);
                    }

                    this._data[this._data.length - 1].push({
                        x: point.x,
                        y: point.y,
                        time: point.time,
                        color: this.penColor
                    });
                }
            };

            SignaturePad.prototype._strokeEnd = function (event) {
                var canDrawCurve = this.points.length > 2;
                var point = this.points[0]; // Point instance

                if (!canDrawCurve && point) {
                    this._drawDot(point);
                }

                if (point) {
                    var lastPointGroup = this._data[this._data.length - 1];
                    var lastPoint = lastPointGroup[lastPointGroup.length - 1]; // plain object

                    // When drawing a dot, there's only one point in a group, so without this check
                    // such group would end up with exactly the same 2 points.
                    if (!point.equals(lastPoint)) {
                        lastPointGroup.push({
                            x: point.x,
                            y: point.y,
                            time: point.time,
                            color: this.penColor
                        });
                    }
                }

                if (typeof this.onEnd === 'function') {
                    this.onEnd(event);
                }
            };

            SignaturePad.prototype._handleMouseEvents = function () {
                this._mouseButtonDown = false;

                this._canvas.addEventListener('mousedown', this._handleMouseDown);
                this._canvas.addEventListener('mousemove', this._handleMouseMove);
                document.addEventListener('mouseup', this._handleMouseUp);
            };

            SignaturePad.prototype._handleTouchEvents = function () {
                // Pass touch events to canvas element on mobile IE11 and Edge.
                this._canvas.style.msTouchAction = 'none';
                this._canvas.style.touchAction = 'none';

                this._canvas.addEventListener('touchstart', this._handleTouchStart);
                this._canvas.addEventListener('touchmove', this._handleTouchMove);
                this._canvas.addEventListener('touchend', this._handleTouchEnd);
            };

            SignaturePad.prototype._reset = function () {
                this.points = [];
                this._lastVelocity = 0;
                this._lastWidth = (this.minWidth + this.maxWidth) / 2;
                this._ctx.fillStyle = this.penColor;
            };

            SignaturePad.prototype._createPoint = function (x, y, time) {
                var rect = this._canvas.getBoundingClientRect();

                return new Point(x - rect.left, y - rect.top, time || new Date().getTime());
            };

            SignaturePad.prototype._addPoint = function (point) {
                var points = this.points;
                var tmp = void 0;

                points.push(point);

                if (points.length > 2) {
                    // To reduce the initial lag make it work with 3 points
                    // by copying the first point to the beginning.
                    if (points.length === 3) points.unshift(points[0]);

                    tmp = this._calculateCurveControlPoints(points[0], points[1], points[2]);
                    var c2 = tmp.c2;
                    tmp = this._calculateCurveControlPoints(points[1], points[2], points[3]);
                    var c3 = tmp.c1;
                    var curve = new Bezier(points[1], c2, c3, points[2]);
                    var widths = this._calculateCurveWidths(curve);

                    // Remove the first element from the list,
                    // so that we always have no more than 4 points in points array.
                    points.shift();

                    return { curve: curve, widths: widths };
                }

                return {};
            };

            SignaturePad.prototype._calculateCurveControlPoints = function (s1, s2, s3) {
                var dx1 = s1.x - s2.x;
                var dy1 = s1.y - s2.y;
                var dx2 = s2.x - s3.x;
                var dy2 = s2.y - s3.y;

                var m1 = { x: (s1.x + s2.x) / 2.0, y: (s1.y + s2.y) / 2.0 };
                var m2 = { x: (s2.x + s3.x) / 2.0, y: (s2.y + s3.y) / 2.0 };

                var l1 = Math.sqrt(dx1 * dx1 + dy1 * dy1);
                var l2 = Math.sqrt(dx2 * dx2 + dy2 * dy2);

                var dxm = m1.x - m2.x;
                var dym = m1.y - m2.y;

                var k = l2 / (l1 + l2);
                var cm = { x: m2.x + dxm * k, y: m2.y + dym * k };

                var tx = s2.x - cm.x;
                var ty = s2.y - cm.y;

                return {
                    c1: new Point(m1.x + tx, m1.y + ty),
                    c2: new Point(m2.x + tx, m2.y + ty)
                };
            };

            SignaturePad.prototype._calculateCurveWidths = function (curve) {
                var startPoint = curve.startPoint;
                var endPoint = curve.endPoint;
                var widths = { start: null, end: null };

                var velocity = this.velocityFilterWeight * endPoint.velocityFrom(startPoint) + (1 - this.velocityFilterWeight) * this._lastVelocity;

                var newWidth = this._strokeWidth(velocity);

                widths.start = this._lastWidth;
                widths.end = newWidth;

                this._lastVelocity = velocity;
                this._lastWidth = newWidth;

                return widths;
            };

            SignaturePad.prototype._strokeWidth = function (velocity) {
                return Math.max(this.maxWidth / (velocity + 1), this.minWidth);
            };

            SignaturePad.prototype._drawPoint = function (x, y, size) {
                var ctx = this._ctx;

                ctx.moveTo(x, y);
                ctx.arc(x, y, size, 0, 2 * Math.PI, false);
                this._isEmpty = false;
            };

            SignaturePad.prototype._drawCurve = function (curve, startWidth, endWidth) {
                var ctx = this._ctx;
                var widthDelta = endWidth - startWidth;
                var drawSteps = Math.floor(curve.length());

                ctx.beginPath();

                for (var i = 0; i < drawSteps; i += 1) {
                    // Calculate the Bezier (x, y) coordinate for this step.
                    var t = i / drawSteps;
                    var tt = t * t;
                    var ttt = tt * t;
                    var u = 1 - t;
                    var uu = u * u;
                    var uuu = uu * u;

                    var x = uuu * curve.startPoint.x;
                    x += 3 * uu * t * curve.control1.x;
                    x += 3 * u * tt * curve.control2.x;
                    x += ttt * curve.endPoint.x;

                    var y = uuu * curve.startPoint.y;
                    y += 3 * uu * t * curve.control1.y;
                    y += 3 * u * tt * curve.control2.y;
                    y += ttt * curve.endPoint.y;

                    var width = startWidth + ttt * widthDelta;
                    this._drawPoint(x, y, width);
                }

                ctx.closePath();
                ctx.fill();
            };

            SignaturePad.prototype._drawDot = function (point) {
                var ctx = this._ctx;
                var width = typeof this.dotSize === 'function' ? this.dotSize() : this.dotSize;

                ctx.beginPath();
                this._drawPoint(point.x, point.y, width);
                ctx.closePath();
                ctx.fill();
            };

            SignaturePad.prototype._fromData = function (pointGroups, drawCurve, drawDot) {
                for (var i = 0; i < pointGroups.length; i += 1) {
                    var group = pointGroups[i];

                    if (group.length > 1) {
                        for (var j = 0; j < group.length; j += 1) {
                            var rawPoint = group[j];
                            var point = new Point(rawPoint.x, rawPoint.y, rawPoint.time);
                            var color = rawPoint.color;

                            if (j === 0) {
                                // First point in a group. Nothing to draw yet.

                                // All points in the group have the same color, so it's enough to set
                                // penColor just at the beginning.
                                this.penColor = color;
                                this._reset();

                                this._addPoint(point);
                            } else if (j !== group.length - 1) {
                                // Middle point in a group.
                                var _addPoint2 = this._addPoint(point),
                                    curve = _addPoint2.curve,
                                    widths = _addPoint2.widths;

                                if (curve && widths) {
                                    drawCurve(curve, widths, color);
                                }
                            } else {
                                // Last point in a group. Do nothing.
                            }
                        }
                    } else {
                        this._reset();
                        var _rawPoint = group[0];
                        drawDot(_rawPoint);
                    }
                }
            };

            SignaturePad.prototype._toSVG = function () {
                var _this2 = this;

                var pointGroups = this._data;
                var canvas = this._canvas;
                var ratio = Math.max(window.devicePixelRatio || 1, 1);
                var minX = 0;
                var minY = 0;
                var maxX = canvas.width / ratio;
                var maxY = canvas.height / ratio;
                var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');

                svg.setAttributeNS(null, 'width', canvas.width);
                svg.setAttributeNS(null, 'height', canvas.height);

                this._fromData(pointGroups, function (curve, widths, color) {
                    var path = document.createElement('path');

                    // Need to check curve for NaN values, these pop up when drawing
                    // lines on the canvas that are not continuous. E.g. Sharp corners
                    // or stopping mid-stroke and than continuing without lifting mouse.
                    if (!isNaN(curve.control1.x) && !isNaN(curve.control1.y) && !isNaN(curve.control2.x) && !isNaN(curve.control2.y)) {
                        var attr = 'M ' + curve.startPoint.x.toFixed(3) + ',' + curve.startPoint.y.toFixed(3) + ' ' + ('C ' + curve.control1.x.toFixed(3) + ',' + curve.control1.y.toFixed(3) + ' ') + (curve.control2.x.toFixed(3) + ',' + curve.control2.y.toFixed(3) + ' ') + (curve.endPoint.x.toFixed(3) + ',' + curve.endPoint.y.toFixed(3));

                        path.setAttribute('d', attr);
                        path.setAttribute('stroke-width', (widths.end * 2.25).toFixed(3));
                        path.setAttribute('stroke', color);
                        path.setAttribute('fill', 'none');
                        path.setAttribute('stroke-linecap', 'round');

                        svg.appendChild(path);
                    }
                }, function (rawPoint) {
                    var circle = document.createElement('circle');
                    var dotSize = typeof _this2.dotSize === 'function' ? _this2.dotSize() : _this2.dotSize;
                    circle.setAttribute('r', dotSize);
                    circle.setAttribute('cx', rawPoint.x);
                    circle.setAttribute('cy', rawPoint.y);
                    circle.setAttribute('fill', rawPoint.color);

                    svg.appendChild(circle);
                });

                var prefix = 'data:image/svg+xml;base64,';
                var header = '<svg' + ' xmlns="http://www.w3.org/2000/svg"' + ' xmlns:xlink="http://www.w3.org/1999/xlink"' + (' viewBox="' + minX + ' ' + minY + ' ' + maxX + ' ' + maxY + '"') + (' width="' + maxX + '"') + (' height="' + maxY + '"') + '>';
                var body = svg.innerHTML;

                // IE hack for missing innerHTML property on SVGElement
                if (body === undefined) {
                    var dummy = document.createElement('dummy');
                    var nodes = svg.childNodes;
                    dummy.innerHTML = '';

                    for (var i = 0; i < nodes.length; i += 1) {
                        dummy.appendChild(nodes[i].cloneNode(true));
                    }

                    body = dummy.innerHTML;
                }

                var footer = '</svg>';
                var data = header + body + footer;

                return prefix + btoa(data);
            };

            SignaturePad.prototype.fromData = function (pointGroups) {
                var _this3 = this;

                this.clear();

                this._fromData(pointGroups, function (curve, widths) {
                    return _this3._drawCurve(curve, widths.start, widths.end);
                }, function (rawPoint) {
                    return _this3._drawDot(rawPoint);
                });

                this._data = pointGroups;
            };

            SignaturePad.prototype.toData = function () {
                return this._data;
            };

            return SignaturePad;

        })));

        @forelse($users as $key => $user)
        var principle = $('#principal').data('principal');
          new SignaturePad(document.querySelector("#principal-board-{{$key}}")).fromData(principle);

        @empty
        @endforelse


        $(function() {
            $('#download').on('click', function (e) {
                var opt = {
                    margin: 0,
                    filename: '{{\Illuminate\Support\Str::slug($home->school_name)}}.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 1 },
                    jsPDF: { unit: 'in', format: 'A4', orientation: 'landscape' },
                    pagebreak: {avoid: 'tr'}
                };
                html2pdf().from(document.getElementById('identity-card')).set(opt).save();
            })
        });
    </script>
@parent
@endsection

