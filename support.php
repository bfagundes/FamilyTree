<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fagundes Family Tree</title>

    <link href="css/primitives.latest.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="css/custom.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <!-- jQuery & JavaScript -->
    <script type="text/javascript" src="js/google-jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script type="text/javascript" src="js/primitives.js"></script>
    <script type="text/javascript" src="js/jquery.layout-latest.min.js"></script>

    <script type="text/javascript">
    jQuery(document).ready(function (){
        jQuery('body').layout({
            center__paneSelector: "#contentpanel"
        });
    });
    </script>

    <!-- Data file -->
    <script type="text/javascript" src="fagundes_tree.js"></script>
    <script type="text/javascript">
    var famDiagram = null;
    var fromItem = 0;
    var toItem = 0;
    var treeItems = {};

    jQuery(document).ready(function () {
        jQuery.ajaxSetup({
            cache: false
        });

        jQuery('#contentpanel').layout({
            center__paneSelector: "#centerpanel",
            center__onresize: function () {
                if (famDiagram != null) {
                    jQuery("#centerpanel").famDiagram("update", primitives.common.UpdateMode.Refresh);
                }
            }
        });

        famDiagram = jQuery("#centerpanel").famDiagram(getConfig());
    });

    function getConfig() {
        var dataSet = "famdata";

        var buttons = [];
        buttons.push(new primitives.famdiagram.ButtonConfig("to", "ui-icon-circle-triangle-w", "to"));
        buttons.push(new primitives.famdiagram.ButtonConfig("from", "ui-icon-circle-triangle-e", "from"));

        var linesPalette = [];
        linesPalette.push(new primitives.famdiagram.PaletteItemConfig({ lineColor: "#C6C6C6", lineWidth: 1, lineType: primitives.common.LineType.Solid })); //1
        linesPalette.push(new primitives.famdiagram.PaletteItemConfig({ lineColor: "#A5A5A5", lineWidth: 1, lineType: primitives.common.LineType.Solid })); //4
        linesPalette.push(new primitives.famdiagram.PaletteItemConfig({ lineColor: "#848484", lineWidth: 1, lineType: primitives.common.LineType.Solid })); //7
        linesPalette.push(new primitives.famdiagram.PaletteItemConfig({ lineColor: "#646464", lineWidth: 1, lineType: primitives.common.LineType.Solid })); //10
        linesPalette.push(new primitives.famdiagram.PaletteItemConfig({ lineColor: "#454545", lineWidth: 1, lineType: primitives.common.LineType.Solid })); //13            

        var annotations = [];

        fromItem = 1;
        toItem = 73;
        connectorAnnotation = new primitives.orgdiagram.ConnectorAnnotationConfig(fromItem, toItem);
        connectorAnnotation.label = "<div class='bp-badge' style='width:10px; height:10px;background-color:red; color: white;'>1</div>Antenato Italiano???";
        connectorAnnotation.labelSize = new primitives.common.Size(80, 30);
        connectorAnnotation.connectorShapeType = primitives.common.ConnectorShapeType.OneWay;
        connectorAnnotation.color = primitives.common.Colors.Red;
        connectorAnnotation.offset = 5;
        connectorAnnotation.lineWidth = 2;
        connectorAnnotation.lineType = primitives.common.LineType.Dashed;
        annotations.push(connectorAnnotation);

        return {
            items: window[dataSet],
            cursorItem: 1,
            graphicsType: primitives.common.GraphicsType.Canvas,
            pageFitMode: primitives.common.PageFitMode.None,
            orientationType: primitives.common.OrientationType.Top,
            elbowType: primitives.common.ElbowType.Round,
            verticalAlignment: primitives.common.VerticalAlignmentType.Middle,
            arrowsDirection: primitives.common.GroupByType.Parents,
            minimalVisibility: primitives.common.Visibility.Auto,               
            hasSelectorCheckbox: primitives.common.Enabled.False,               
            selectionPathMode: primitives.orgdiagram.SelectionPathMode.FullStack,
            hasButtons: primitives.common.Enabled.False,                        
            buttons: buttons,
            annotations: annotations,
            onButtonClick: onButtonClick,
            onCursorChanging: onCursorChanging,
            onCursorChanged: onCursorChanged,
            onHighlightChanging: onHighlightChanging,
            onHighlightChanged: onHighlightChanged,
            onSelectionChanged: onSelectionChanged,
            itemTitleFirstFontColor: primitives.common.Colors.White,
            itemTitleSecondFontColor: primitives.common.Colors.White,
            normalLevelShift: 30,
            lineLevelShift: 24,
            normalItemsInterval: 20,
            lineItemsInterval: 10,
            cousinsIntervalMultiplier: 1,
            dotLevelShift: 30,
            dotItemsInterval: 10,
            highlightLinesColor: primitives.common.Colors.Orange,
            linesWidth: 1,
            linesColor: "black",
            linesPalette: linesPalette,
            showLabels: primitives.common.Enabled.False
        };
    }
    
    function getContactTemplate() {
        var result = new primitives.famdiagram.TemplateConfig();
        result.name = "contactTemplate";

        result.itemSize = new primitives.common.Size(220, 120);
        result.minimizedItemSize = new primitives.common.Size(3, 3);
        result.highlightPadding = new primitives.common.Thickness(2, 2, 2, 2);

        var itemTemplate = jQuery(
          '<div class="bp-item bp-corner-all bt-item-frame">'
            + '<div class="bp-item bp-corner-all bp-title-frame" style="top: 2px; left: 2px; width: 216px; height: 20px;">'
                + '<div name="title" class="bp-item bp-title" style="top: 3px; left: 6px; width: 208px; height: 18px;">'
                + '</div>'
            + '</div>'
            + '<div class="bp-item bp-photo-frame" style="top: 26px; left: 2px; width: 50px; height: 60px;">'
                + '<img name="photo" style="height:60px; width:50px;" />'
            + '</div>'
            + '<div name="phone" class="bp-item" style="top: 26px; left: 56px; width: 162px; height: 18px; font-size: 12px;"></div>'
            + '<div name="email" class="bp-item" style="top: 44px; left: 56px; width: 162px; height: 18px; font-size: 12px;"></div>'
            + '<div name="description" class="bp-item" style="top: 62px; left: 56px; width: 162px; height: 36px; font-size: 10px;"></div>'
        + '</div>'
        ).css({
            width: result.itemSize.width + "px",
            height: result.itemSize.height + "px"
        }).addClass("bp-item bp-corner-all bt-item-frame");
        result.itemTemplate = itemTemplate.wrap('<div>').parent().html();

        return result;
    }

    // function getParentsList(data) {};
    function onSelectionChanged(e, data) {}
    function onHighlightChanging(e, data) {}
    function onHighlightChanged(e, data) {}
    function onCursorChanging(e, data) {}
    function onCursorChanged(e, data) {}
    function onButtonClick(e, data) {}
    </script>

    <!-- Where the content is beeing written -->
    <div id="contentpanel" style="padding: 0px;">
        <div id="centerpanel" style="overflow: hidden; padding: 0px; margin: 0px; border: 0px;">
    </div>

</body>
</html>