<!-- Seta com comentário do item 1 pro item 73 -->
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

<!-- Backgroud de outra cor nos items 2 e 3 -->
var backgroundAnnotation = new primitives.orgdiagram.BackgroundAnnotationConfig([2, 3]);
backgroundAnnotation.borderColor = "#f8e5f9";
backgroundAnnotation.fillColor = "#e5f9f8";
backgroundAnnotation.lineWidth = 2;
backgroundAnnotation.selectItems = true;
backgroundAnnotation.lineType = primitives.common.LineType.Dotted;
annotations.push(backgroundAnnotation);

<!-- X vermelho no item 2 -->
shapeAnnotation2 = new primitives.orgdiagram.ShapeAnnotationConfig([2]);
shapeAnnotation2.label = "<div class='bp-badge' style='width:10px; height:10px;background-color:red; color: white;'>3</div>Cross Out shape annotation";
shapeAnnotation2.labelSize = new primitives.common.Size(120, 50);
shapeAnnotation2.shapeType = primitives.common.ShapeType.CrossOut;
shapeAnnotation2.borderColor = primitives.common.Colors.Red;
shapeAnnotation2.offset = new primitives.common.Thickness(6, 3, 6, 6);
shapeAnnotation2.lineWidth = 2;
shapeAnnotation2.selectItems = false;
shapeAnnotation2.lineType = primitives.common.LineType.Dashed;
annotations.push(shapeAnnotation2);

<!-- Circulo no item 3 -->
shapeAnnotation3 = new primitives.orgdiagram.ShapeAnnotationConfig([3]);
shapeAnnotation3.label = "<div class='bp-badge' style='width:10px; height:10px;background-color:red; color: white;'>4</div>Oval shape annotation";
shapeAnnotation3.labelSize = new primitives.common.Size(100, 50);
shapeAnnotation3.shapeType = primitives.common.ShapeType.Oval;
shapeAnnotation3.borderColor = primitives.common.Colors.Red;
shapeAnnotation3.offset = 14;
shapeAnnotation3.lineWidth = 2;
shapeAnnotation3.selectItems = true;
shapeAnnotation3.lineType = primitives.common.LineType.Dashed;
shapeAnnotation3.fillColor = null;
annotations.push(shapeAnnotation3);