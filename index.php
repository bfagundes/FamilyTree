<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fagundes Family Tree</title>

    <!-- CSS Styles -->
    <link type="text/css" rel="stylesheet" href="css/jquery-ui-1.10.2.custom.css">
    <link type="text/css" rel="stylesheet" href="css/primitives.latest.css" media="screen"/>
    <link type="text/css" rel="stylesheet" href="css/layout-default-latest.css"/>
    <link type="text/css" rel="stylesheet" href="css/custom.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- jQuery & JavaScript -->
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
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
    <script type="text/javascript" src="dataset.js"></script>
    <script type="text/javascript">
    var famDiagram = null;

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

        // Pegando as configurações
        // famdiagram.templates = [getContactTemplate()];
        // famdiagram.onItemRender = onTemplateRender;
        famDiagram = jQuery("#centerpanel").famDiagram(getConfig());
    });

    function getConfig() {
        // definindo o dataset
        var dataSet = "famdata";

        // lista de Botoes
        var buttons = [];
        //buttons.push(new primitives.famdiagram.ButtonConfig("to", "ui-icon-circle-triangle-w", "to"));
        //buttons.push(new primitives.famdiagram.ButtonConfig("from", "ui-icon-circle-triangle-e", "from"));

        // Estilo das linhas e setas
        var linesPalette = [];
        linesPalette.push(new primitives.famdiagram.PaletteItemConfig({ lineColor: "#C6C6C6", lineWidth: 1, lineType: primitives.common.LineType.Solid })); //1
        linesPalette.push(new primitives.famdiagram.PaletteItemConfig({ lineColor: "#A5A5A5", lineWidth: 1, lineType: primitives.common.LineType.Solid })); //4
        linesPalette.push(new primitives.famdiagram.PaletteItemConfig({ lineColor: "#848484", lineWidth: 1, lineType: primitives.common.LineType.Solid })); //7
        linesPalette.push(new primitives.famdiagram.PaletteItemConfig({ lineColor: "#646464", lineWidth: 1, lineType: primitives.common.LineType.Solid })); //10
        linesPalette.push(new primitives.famdiagram.PaletteItemConfig({ lineColor: "#454545", lineWidth: 1, lineType: primitives.common.LineType.Solid })); //13            

        // lista de Anotacoes
        var annotations = [];

        // Seta com comentário do item 1 pro item 73
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
            // set de itens
            items: window[dataSet],

            // item selecionado
            cursorItem: 1,

            // como a pagina sera desenhada. Canvas = melhores graficos (?)
            graphicsType: primitives.common.GraphicsType.Canvas,

            // como a página sera exibida. None = todos maximizados
            pageFitMode: primitives.common.PageFitMode.FitToPage,

            // orientacao. Top = mais antigos embaixo
            orientationType: primitives.common.OrientationType.Top,

            // como as curvas das linhas são desenhadas.
            elbowType: primitives.common.ElbowType.Round,

            // alinhamento dos nós
            verticalAlignment: primitives.common.VerticalAlignmentType.Middle,

            // direcao das flechas. Parents = dos pais pros filhos.
            arrowsDirection: primitives.common.GroupByType.Parents,

            // como aparecem os nodos minimizados
            minimalVisibility: primitives.common.Visibility.Auto,               

            // exibir checkbox de selecao?
            hasSelectorCheckbox: primitives.common.Enabled.False,               

            // ???
            selectionPathMode: primitives.orgdiagram.SelectionPathMode.FullStack,

            // exibir botoes nos nodos?
            hasButtons: primitives.common.Enabled.False,                        

            // lista de botoes (definidos anteriormente)
            buttons: buttons,

            // lista de anotacoes (definidas anteriormente)
            annotations: annotations,

            // User interaction parameters
            onButtonClick: onButtonClick,
            onCursorChanging: onCursorChanging,
            onCursorChanged: onCursorChanged,
            onHighlightChanging: onHighlightChanging,
            onHighlightChanged: onHighlightChanged,
            onSelectionChanged: onSelectionChanged,

            // Cor do texto do titulo
            itemTitleFirstFontColor: primitives.common.Colors.White,
            itemTitleSecondFontColor: primitives.common.Colors.White,

            // distance between the lines
            normalLevelShift: 30,
            lineLevelShift: 24,

            // distance between items (Horizontal)
            normalItemsInterval: 20,
            lineItemsInterval: 10,
            cousinsIntervalMultiplier: 1,

            // Have no idea what this does
            dotLevelShift: 30,
            dotItemsInterval: 10,

            // Color of something (?)
            highlightLinesColor: primitives.common.Colors.Orange,

            // Exactly what it says LOL
            linesWidth: 1,

            // Main color of the lines
            linesColor: "black",

            // lista de estilo das linhas (definido anteriormente)
            linesPalette: linesPalette,

            // Enable or disable labels on nodes
            showLabels: primitives.common.Enabled.False
        };
    }

    function onTemplateRender(event, data) {
        switch (data.renderingMode) {
            case primitives.common.RenderingMode.Create:
                /* Initialize widgets here */
                break;
            case primitives.common.RenderingMode.Update:
                /* Update widgets here */
                break;
        }

        var itemConfig = data.context;
        data.element.find("[name=photo]").attr({ "src": itemConfig.image, "alt": itemConfig.title });
        data.element.find("[name=titleBackground]").css({ "background": itemConfig.itemTitleColor });

        var fields = ["title", "description", "phone", "email"];
        for (var index = 0; index < fields.length; index++) {
            var field = fields[index];

            var element = data.element.find("[name=" + field + "]");
            if (element.text() != itemConfig[field]) {
                element.text(itemConfig[field]);
            }
        }
    }

    // Configurações do FamDiagram
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