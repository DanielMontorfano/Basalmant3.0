/**
 * @license Highstock JS v11.4.1 (2024-04-04)
 *
 * Drag-panes module
 *
 * (c) 2010-2024 Highsoft AS
 * Author: Kacper Madej
 *
 * License: www.highcharts.com/license
 */
(function (factory) {
    if (typeof module === 'object' && module.exports) {
        factory['default'] = factory;
        module.exports = factory;
    } else if (typeof define === 'function' && define.amd) {
        define('highcharts/modules/drag-panes', ['highcharts', 'highcharts/modules/stock'], function (Highcharts) {
            factory(Highcharts);
            factory.Highcharts = Highcharts;
            return factory;
        });
    } else {
        factory(typeof Highcharts !== 'undefined' ? Highcharts : undefined);
    }
}(function (Highcharts) {
    'use strict';
    var _modules = Highcharts ? Highcharts._modules : {};
    function _registerModule(obj, path, args, fn) {
        if (!obj.hasOwnProperty(path)) {
            obj[path] = fn.apply(null, args);

            if (typeof CustomEvent === 'function') {
                window.dispatchEvent(new CustomEvent(
                    'HighchartsModuleLoaded',
                    { detail: { path: path, module: obj[path] } }
                ));
            }
        }
    }
    _registerModule(_modules, 'Extensions/DragPanes/AxisResizerDefaults.js', [], function () {
        /* *
         *
         *  Plugin for resizing axes / panes in a chart.
         *
         *  (c) 2010-2024 Highsoft AS
         *
         *  Author: Kacper Madej
         *
         *  License: www.highcharts.com/license
         *
         *  !!!!!!! SOURCE GETS TRANSPILED BY TYPESCRIPT. EDIT TS FILE ONLY. !!!!!!!
         *
         * */
        /* *
         *
         *  API Options
         *
         * */
        var AxisResizerDefaults = {
            /**
             * Minimal size of a resizable axis. Could be set as a percent
             * of plot area or pixel size.
             *
             * @sample {highstock} stock/yaxis/resize-min-max-length
             *         minLength and maxLength
             *
             * @type      {number|string}
             * @product   highstock
             * @requires  modules/drag-panes
             * @apioption yAxis.minLength
             */
            minLength: '10%',
            /**
             * Maximal size of a resizable axis. Could be set as a percent
             * of plot area or pixel size.
             *
             * @sample {highstock} stock/yaxis/resize-min-max-length
             *         minLength and maxLength
             *
             * @type      {number|string}
             * @product   highstock
             * @requires  modules/drag-panes
             * @apioption yAxis.maxLength
             */
            maxLength: '100%',
            /**
             * Options for axis resizing. It adds a thick line between panes which
             * the user can drag in order to resize the panes.
             *
             * @sample {highstock} stock/demo/candlestick-and-volume
             *         Axis resizing enabled
             *
             * @product      highstock
             * @requires     modules/drag-panes
             * @optionparent yAxis.resize
             */
            resize: {
                /**
                 * Contains two arrays of axes that are controlled by control line
                 * of the axis.
                 *
                 * @requires modules/drag-panes
                 */
                controlledAxis: {
                    /**
                     * Array of axes that should move out of the way of resizing
                     * being done for the current axis. If not set, the next axis
                     * will be used.
                     *
                     * @sample {highstock} stock/yaxis/multiple-resizers
                     *         Three panes with resizers
                     * @sample {highstock} stock/yaxis/resize-multiple-axes
                     *         One resizer controlling multiple axes
                     *
                     * @type     {Array<number|string>}
                     * @default  []
                     * @requires modules/drag-panes
                     */
                    next: [],
                    /**
                     * Array of axes that should move with the current axis
                     * while resizing.
                     *
                     * @sample {highstock} stock/yaxis/multiple-resizers
                     *         Three panes with resizers
                     * @sample {highstock} stock/yaxis/resize-multiple-axes
                     *         One resizer controlling multiple axes
                     *
                     * @type     {Array<number|string>}
                     * @default  []
                     * @requires modules/drag-panes
                     */
                    prev: []
                },
                /**
                 * Enable or disable resize by drag for the axis.
                 *
                 * @sample {highstock} stock/demo/candlestick-and-volume
                 *         Enabled resizer
                 *
                 * @requires modules/drag-panes
                 */
                enabled: false,
                /**
                 * Cursor style for the control line.
                 *
                 * In styled mode use class `highcharts-axis-resizer` instead.
                 *
                 * @requires modules/drag-panes
                 */
                cursor: 'ns-resize',
                /**
                 * Color of the control line.
                 *
                 * In styled mode use class `highcharts-axis-resizer` instead.
                 *
                 * @sample {highstock} stock/yaxis/styled-resizer
                 *         Styled resizer
                 *
                 * @type     {Highcharts.ColorString}
                 * @requires modules/drag-panes
                 */
                lineColor: "#cccccc" /* Palette.neutralColor20 */,
                /**
                 * Dash style of the control line.
                 *
                 * In styled mode use class `highcharts-axis-resizer` instead.
                 *
                 * @see For supported options check [dashStyle](#plotOptions.series.dashStyle)
                 *
                 * @sample {highstock} stock/yaxis/styled-resizer
                 *         Styled resizer
                 *
                 * @requires modules/drag-panes
                 */
                lineDashStyle: 'Solid',
                /**
                 * Width of the control line.
                 *
                 * In styled mode use class `highcharts-axis-resizer` instead.
                 *
                 * @sample {highstock} stock/yaxis/styled-resizer
                 *         Styled resizer
                 *
                 * @requires modules/drag-panes
                 */
                lineWidth: 4,
                /**
                 * Horizontal offset of the control line.
                 *
                 * @sample {highstock} stock/yaxis/styled-resizer
                 *         Styled resizer
                 *
                 * @requires modules/drag-panes
                 */
                x: 0,
                /**
                 * Vertical offset of the control line.
                 *
                 * @sample {highstock} stock/yaxis/styled-resizer
                 *         Styled resizer
                 *
                 * @requires modules/drag-panes
                 */
                y: 0
            }
        };
        /* *
         *
         *  Default Export
         *
         * */

        return AxisResizerDefaults;
    });
    _registerModule(_modules, 'Extensions/DragPanes/AxisResizer.js', [_modules['Extensions/DragPanes/AxisResizerDefaults.js'], _modules['Core/Utilities.js']], function (AxisResizerDefaults, U) {
        /* *
         *
         *  Plugin for resizing axes / panes in a chart.
         *
         *  (c) 2010-2024 Highsoft AS
         *
         *  Author: Kacper Madej
         *
         *  License: www.highcharts.com/license
         *
         *  !!!!!!! SOURCE GETS TRANSPILED BY TYPESCRIPT. EDIT TS FILE ONLY. !!!!!!!
         *
         * */
        var addEvent = U.addEvent, clamp = U.clamp, isNumber = U.isNumber, relativeLength = U.relativeLength;
        /* *
         *
         *  Class
         *
         * */
        /**
         * The AxisResizer class.
         *
         * @private
         * @class
         * @name Highcharts.AxisResizer
         *
         * @param {Highcharts.Axis} axis
         *        Main axis for the AxisResizer.
         */
        var AxisResizer = /** @class */ (function () {
            /* *
             *
             *  Constructor
             *
             * */
            function AxisResizer(axis) {
                this.init(axis);
            }
            /* *
             *
             *  Functions
             *
             * */
            /**
             * Initialize the AxisResizer object.
             *
             * @function Highcharts.AxisResizer#init
             *
             * @param {Highcharts.Axis} axis
             *        Main axis for the AxisResizer.
             */
            AxisResizer.prototype.init = function (axis, update) {
                this.axis = axis;
                this.options = axis.options.resize || {};
                this.render();
                if (!update) {
                    // Add mouse events.
                    this.addMouseEvents();
                }
            };
            /**
             * Render the AxisResizer
             *
             * @function Highcharts.AxisResizer#render
             */
            AxisResizer.prototype.render = function () {
                var resizer = this, axis = resizer.axis, chart = axis.chart, options = resizer.options, x = options.x || 0, y = options.y, 
                // Normalize control line position according to the plot area
                pos = clamp(axis.top + axis.height + y, chart.plotTop, chart.plotTop + chart.plotHeight);
                var attr = {};
                if (!chart.styledMode) {
                    attr = {
                        cursor: options.cursor,
                        stroke: options.lineColor,
                        'stroke-width': options.lineWidth,
                        dashstyle: options.lineDashStyle
                    };
                }
                // Register current position for future reference.
                resizer.lastPos = pos - y;
                if (!resizer.controlLine) {
                    resizer.controlLine = chart.renderer.path()
                        .addClass('highcharts-axis-resizer');
                }
                // Add to axisGroup after axis update, because the group is recreated
                // Do .add() before path is calculated because strokeWidth() needs it.
                resizer.controlLine.add(axis.axisGroup);
                var lineWidth = chart.styledMode ?
                    resizer.controlLine.strokeWidth() :
                    options.lineWidth;
                attr.d = chart.renderer.crispLine([
                    ['M', axis.left + x, pos],
                    ['L', axis.left + axis.width + x, pos]
                ], lineWidth);
                resizer.controlLine.attr(attr);
            };
            /**
             * Set up the mouse and touch events for the control line.
             *
             * @function Highcharts.AxisResizer#addMouseEvents
             */
            AxisResizer.prototype.addMouseEvents = function () {
                var resizer = this, ctrlLineElem = resizer.controlLine.element, container = resizer.axis.chart.container, eventsToUnbind = [];
                var mouseMoveHandler, mouseUpHandler, mouseDownHandler;
                // Create mouse events' handlers.
                // Make them as separate functions to enable wrapping them:
                resizer.mouseMoveHandler = mouseMoveHandler = function (e) { return (resizer.onMouseMove(e)); };
                resizer.mouseUpHandler = mouseUpHandler = function (e) { return (resizer.onMouseUp(e)); };
                resizer.mouseDownHandler = mouseDownHandler = function () { return (resizer.onMouseDown()); };
                eventsToUnbind.push(
                // Add mouse move and mouseup events. These are bind to doc/div,
                // because resizer.grabbed flag is stored in mousedown events.
                addEvent(container, 'mousemove', mouseMoveHandler), addEvent(container.ownerDocument, 'mouseup', mouseUpHandler), addEvent(ctrlLineElem, 'mousedown', mouseDownHandler), 
                // Touch events.
                addEvent(container, 'touchmove', mouseMoveHandler), addEvent(container.ownerDocument, 'touchend', mouseUpHandler), addEvent(ctrlLineElem, 'touchstart', mouseDownHandler));
                resizer.eventsToUnbind = eventsToUnbind;
            };
            /**
             * Mouse move event based on x/y mouse position.
             *
             * @function Highcharts.AxisResizer#onMouseMove
             *
             * @param {Highcharts.PointerEventObject} e
             *        Mouse event.
             */
            AxisResizer.prototype.onMouseMove = function (e) {
                /*
                 * In iOS, a mousemove event with e.pageX === 0 is fired when holding
                 * the finger down in the center of the scrollbar. This should
                 * be ignored. Borrowed from Navigator.
                 */
                if (!e.touches || e.touches[0].pageX !== 0) {
                    var pointer = this.axis.chart.pointer;
                    // Drag the control line
                    if (this.grabbed && pointer) {
                        this.hasDragged = true;
                        this.updateAxes(pointer.normalize(e).chartY - (this.options.y || 0));
                    }
                }
            };
            /**
             * Mouse up event based on x/y mouse position.
             *
             * @function Highcharts.AxisResizer#onMouseUp
             *
             * @param {Highcharts.PointerEventObject} e
             *        Mouse event.
             */
            AxisResizer.prototype.onMouseUp = function (e) {
                var pointer = this.axis.chart.pointer;
                if (this.hasDragged && pointer) {
                    this.updateAxes(pointer.normalize(e).chartY - (this.options.y || 0));
                }
                // Restore runPointActions.
                this.grabbed = this.hasDragged = this.axis.chart.activeResizer = void 0;
            };
            /**
             * Mousedown on a control line.
             * Will store necessary information for drag&drop.
             *
             * @function Highcharts.AxisResizer#onMouseDown
             */
            AxisResizer.prototype.onMouseDown = function () {
                var _a;
                // Clear all hover effects.
                (_a = this.axis.chart.pointer) === null || _a === void 0 ? void 0 : _a.reset(false, 0);
                // Disable runPointActions.
                this.grabbed = this.axis.chart.activeResizer = true;
            };
            /**
             * Update all connected axes after a change of control line position
             *
             * @function Highcharts.AxisResizer#updateAxes
             *
             * @param {number} chartY
             */
            AxisResizer.prototype.updateAxes = function (chartY) {
                var resizer = this, chart = resizer.axis.chart, axes = resizer.options.controlledAxis, nextAxes = axes.next.length === 0 ?
                    [chart.yAxis.indexOf(resizer.axis) + 1] : axes.next, 
                // Main axis is included in the prev array by default
                prevAxes = [resizer.axis].concat(axes.prev), 
                // Prev and next configs
                axesConfigs = [], plotTop = chart.plotTop, plotHeight = chart.plotHeight, plotBottom = plotTop + plotHeight, calculatePercent = function (value) { return (value * 100 / plotHeight + '%'); }, normalize = function (val, min, max) { return (Math.round(clamp(val, min, max))); };
                // Normalize chartY to plot area limits
                chartY = clamp(chartY, plotTop, plotBottom);
                var stopDrag = false, yDelta = chartY - resizer.lastPos;
                // Update on changes of at least 1 pixel in the desired direction
                if (yDelta * yDelta < 1) {
                    return;
                }
                var isFirst = true;
                // First gather info how axes should behave
                for (var _i = 0, _a = [prevAxes, nextAxes]; _i < _a.length; _i++) {
                    var axesGroup = _a[_i];
                    for (var _b = 0, axesGroup_1 = axesGroup; _b < axesGroup_1.length; _b++) {
                        var axisInfo = axesGroup_1[_b];
                        // Axes given as array index, axis object or axis id
                        var axis = isNumber(axisInfo) ?
                            // If it's a number - it's an index
                            chart.yAxis[axisInfo] :
                            (
                            // If it's first elem. in first group
                            isFirst ?
                                // Then it's an Axis object
                                axisInfo :
                                // Else it should be an id
                                chart.get(axisInfo)), axisOptions = axis && axis.options, optionsToUpdate = {};
                        var height = void 0, top_1 = void 0;
                        // Skip if axis is not found
                        // or it is navigator's yAxis (#7732)
                        if (!axisOptions ||
                            axisOptions.id === 'navigator-y-axis') {
                            isFirst = false;
                            continue;
                        }
                        top_1 = axis.top;
                        var minLength = Math.round(relativeLength(axisOptions.minLength || NaN, plotHeight)), maxLength = Math.round(relativeLength(axisOptions.maxLength || NaN, plotHeight));
                        if (!isFirst) {
                            // Try to change height first. yDelta could had changed
                            yDelta = chartY - resizer.lastPos;
                            // Normalize height to option limits
                            height = normalize(axis.len - yDelta, minLength, maxLength);
                            // Adjust top, so the axis looks like shrinked from top
                            top_1 = axis.top + yDelta;
                            // Check for plot area limits
                            if (top_1 + height > plotBottom) {
                                var hDelta = plotBottom - height - top_1;
                                chartY += hDelta;
                                top_1 += hDelta;
                            }
                            // Fit to plot - when overflowing on top
                            if (top_1 < plotTop) {
                                top_1 = plotTop;
                                if (top_1 + height > plotBottom) {
                                    height = plotHeight;
                                }
                            }
                            // If next axis meets min length, stop dragging:
                            if (height === minLength) {
                                stopDrag = true;
                            }
                            axesConfigs.push({
                                axis: axis,
                                options: {
                                    top: calculatePercent(top_1 - plotTop),
                                    height: calculatePercent(height)
                                }
                            });
                        }
                        else {
                            // Normalize height to option limits
                            height = normalize(chartY - top_1, minLength, maxLength);
                            // If prev axis meets max length, stop dragging:
                            if (height === maxLength) {
                                stopDrag = true;
                            }
                            // Check axis size limits
                            chartY = top_1 + height;
                            axesConfigs.push({
                                axis: axis,
                                options: {
                                    height: calculatePercent(height)
                                }
                            });
                        }
                        isFirst = false;
                        optionsToUpdate.height = height;
                    }
                }
                // If we hit the min/maxLength with dragging, don't do anything:
                if (!stopDrag) {
                    // Now update axes:
                    for (var _c = 0, axesConfigs_1 = axesConfigs; _c < axesConfigs_1.length; _c++) {
                        var config = axesConfigs_1[_c];
                        config.axis.update(config.options, false);
                    }
                    chart.redraw(false);
                }
            };
            /**
             * Destroy AxisResizer. Clear outside references, clear events,
             * destroy elements, nullify properties.
             *
             * @function Highcharts.AxisResizer#destroy
             */
            AxisResizer.prototype.destroy = function () {
                var resizer = this, axis = resizer.axis;
                // Clear resizer in axis
                delete axis.resizer;
                // Clear control line events
                if (this.eventsToUnbind) {
                    this.eventsToUnbind.forEach(function (unbind) { return unbind(); });
                }
                // Destroy AxisResizer elements
                resizer.controlLine.destroy();
                // Nullify properties
                for (var _i = 0, _a = Object.keys(resizer); _i < _a.length; _i++) {
                    var key = _a[_i];
                    resizer[key] = null;
                }
            };
            /* *
             *
             *  Static Properties
             *
             * */
            // Default options for AxisResizer.
            AxisResizer.resizerOptions = AxisResizerDefaults;
            return AxisResizer;
        }());
        /* *
         *
         *  Default Export
         *
         * */

        return AxisResizer;
    });
    _registerModule(_modules, 'Extensions/DragPanes/DragPanes.js', [_modules['Extensions/DragPanes/AxisResizer.js'], _modules['Core/Defaults.js'], _modules['Core/Utilities.js']], function (AxisResizer, D, U) {
        /* *
         *
         *  Plugin for resizing axes / panes in a chart.
         *
         *  (c) 2010-2024 Highsoft AS
         *
         *  Author: Kacper Madej
         *
         *  License: www.highcharts.com/license
         *
         *  !!!!!!! SOURCE GETS TRANSPILED BY TYPESCRIPT. EDIT TS FILE ONLY. !!!!!!!
         *
         * */
        var defaultOptions = D.defaultOptions;
        var addEvent = U.addEvent, merge = U.merge, wrap = U.wrap;
        /* *
         *
         *  Functions
         *
         * */
        /**
         * @private
         */
        function compose(AxisClass, PointerClass) {
            if (!AxisClass.keepProps.includes('resizer')) {
                merge(true, defaultOptions.yAxis, AxisResizer.resizerOptions);
                // Keep resizer reference on axis update
                AxisClass.keepProps.push('resizer');
                addEvent(AxisClass, 'afterRender', onAxisAfterRender);
                addEvent(AxisClass, 'destroy', onAxisDestroy);
                wrap(PointerClass.prototype, 'runPointActions', wrapPointerRunPointActions);
                wrap(PointerClass.prototype, 'drag', wrapPointerDrag);
            }
        }
        /**
         * Add new AxisResizer, update or remove it
         * @private
         */
        function onAxisAfterRender() {
            var axis = this, resizer = axis.resizer, resizerOptions = axis.options.resize;
            if (resizerOptions) {
                var enabled = resizerOptions.enabled !== false;
                if (resizer) {
                    // Resizer present and enabled
                    if (enabled) {
                        // Update options
                        resizer.init(axis, true);
                        // Resizer present, but disabled
                    }
                    else {
                        // Destroy the resizer
                        resizer.destroy();
                    }
                }
                else {
                    // Resizer not present and enabled
                    if (enabled) {
                        // Add new resizer
                        axis.resizer = new AxisResizer(axis);
                    }
                    // Resizer not present and disabled, so do nothing
                }
            }
        }
        /**
         * Clear resizer on axis remove.
         * @private
         */
        function onAxisDestroy(e) {
            var axis = this;
            if (!e.keepEvents && axis.resizer) {
                axis.resizer.destroy();
            }
        }
        /**
         * Prevent default drag action detection while dragging a control line of
         * AxisResizer. (#7563)
         * @private
         */
        function wrapPointerDrag(proceed) {
            var pointer = this;
            if (!pointer.chart.activeResizer) {
                proceed.apply(pointer, [].slice.call(arguments, 1));
            }
        }
        /**
         * Prevent any hover effects while dragging a control line of AxisResizer.
         * @private
         */
        function wrapPointerRunPointActions(proceed) {
            var pointer = this;
            if (!pointer.chart.activeResizer) {
                proceed.apply(pointer, [].slice.call(arguments, 1));
            }
        }
        /* *
         *
         *  Default Export
         *
         * */
        var DragPanes = {
            compose: compose
        };

        return DragPanes;
    });
    _registerModule(_modules, 'masters/modules/drag-panes.src.js', [_modules['Core/Globals.js'], _modules['Extensions/DragPanes/AxisResizer.js'], _modules['Extensions/DragPanes/DragPanes.js']], function (Highcharts, AxisResizer, DragPanes) {

        var G = Highcharts;
        G.AxisResizer = AxisResizer;
        DragPanes.compose(G.Axis, G.Pointer);

        return Highcharts;
    });
}));