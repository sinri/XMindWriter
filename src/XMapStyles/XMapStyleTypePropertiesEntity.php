<?php


namespace sinri\XMindWriter\XMapStyles;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapStyleTypePropertiesEntity extends XMapNodeEntity
{
    protected $type;

    protected $attrAngle;//angle
    protected $attrArrowBeginClass;//arrow-begin-class
    protected $attrArrowEndClass;//arrow-end-class
    protected $attrBackground;//background
    protected $attrFoBackgroundColor;//fo:background-color
    protected $attrFoColor;//fo:color
    protected $attrSvgFill;//svg:fill
    protected $attrFoTextDecoration;//fo:text-decoration
    protected $attrFoFontFamily;//fo:font-family
    protected $attrFoFontSize;//fo:font-size
    protected $attrFoFontStyle;//fo:font-style
    protected $attrFoFontWeight;//fo:font-weight
    protected $attrSvgHeight;//svg:height
    protected $attrLineClass;//line-class
    protected $attrLineColor;//line-color
    protected $attrLineCorner;//line-corner
    protected $attrLinePattern;//line-pattern
    protected $attrLineTapered;//line-tapered
    protected $attrLineWidth;//line-width
    protected $attrFoMarginBottom;//fo:margin-bottom
    protected $attrFoMarginLeft;//fo:margin-left
    protected $attrFoMarginRight;//fo:margin-right
    protected $attrFoMarginTop;//fo:margin-top
    protected $attrMultiLineColors;//multi-line-colors
    protected $attrSvgOpacity;//svg:opacity
    protected $attrShapeClass;//shape-class
    protected $attrShapeCorner;//shape-corner
    protected $attrSpacingMajor;//spacing-major
    protected $attrSpacingMinor;//spacing-minor
    protected $attrFoTextAlign;//fo:text-align
    protected $attrFoTextBullet;//fo:text-bullet
    protected $attrSvgWidth;//svg:width
    protected $attrSvgX;//svg:x
    protected $attrSvgY;//svg:y
    /**
     * @var XMapDefaultStyleEntity [0,n) styles that describe specific style applied for different style family
     * (only available within theme-properties element)
     */
    protected $defaultStyle;

    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return XMapStyleTypePropertiesEntity
     */
    public function setType(string $type): XMapStyleTypePropertiesEntity
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrAngle(): string
    {
        return $this->attrAngle;
    }

    /**
     * @param string $attrAngle
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrAngle(string $attrAngle): XMapStyleTypePropertiesEntity
    {
        $this->attrAngle = $attrAngle;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrArrowBeginClass(): string
    {
        return $this->attrArrowBeginClass;
    }

    /**
     * @param string $attrArrowBeginClass
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrArrowBeginClass(string $attrArrowBeginClass): XMapStyleTypePropertiesEntity
    {
        $this->attrArrowBeginClass = $attrArrowBeginClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrArrowEndClass(): string
    {
        return $this->attrArrowEndClass;
    }

    /**
     * @param string $attrArrowEndClass
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrArrowEndClass(string $attrArrowEndClass): XMapStyleTypePropertiesEntity
    {
        $this->attrArrowEndClass = $attrArrowEndClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrBackground(): string
    {
        return $this->attrBackground;
    }

    /**
     * @param string $attrBackground
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrBackground(string $attrBackground): XMapStyleTypePropertiesEntity
    {
        $this->attrBackground = $attrBackground;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoBackgroundColor(): string
    {
        return $this->attrFoBackgroundColor;
    }

    /**
     * @param string $attrFoBackgroundColor
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoBackgroundColor(string $attrFoBackgroundColor): XMapStyleTypePropertiesEntity
    {
        $this->attrFoBackgroundColor = $attrFoBackgroundColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoColor(): string
    {
        return $this->attrFoColor;
    }

    /**
     * @param string $attrFoColor
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoColor(string $attrFoColor): XMapStyleTypePropertiesEntity
    {
        $this->attrFoColor = $attrFoColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgFill(): string
    {
        return $this->attrSvgFill;
    }

    /**
     * @param string $attrSvgFill
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgFill(string $attrSvgFill): XMapStyleTypePropertiesEntity
    {
        $this->attrSvgFill = $attrSvgFill;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoTextDecoration(): string
    {
        return $this->attrFoTextDecoration;
    }

    /**
     * @param string $attrFoTextDecoration
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoTextDecoration(string $attrFoTextDecoration): XMapStyleTypePropertiesEntity
    {
        $this->attrFoTextDecoration = $attrFoTextDecoration;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoFontFamily(): string
    {
        return $this->attrFoFontFamily;
    }

    /**
     * @param string $attrFoFontFamily
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoFontFamily(string $attrFoFontFamily): XMapStyleTypePropertiesEntity
    {
        $this->attrFoFontFamily = $attrFoFontFamily;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoFontSize(): string
    {
        return $this->attrFoFontSize;
    }

    /**
     * @param string $attrFoFontSize
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoFontSize(string $attrFoFontSize): XMapStyleTypePropertiesEntity
    {
        $this->attrFoFontSize = $attrFoFontSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoFontStyle(): string
    {
        return $this->attrFoFontStyle;
    }

    /**
     * @param string $attrFoFontStyle
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoFontStyle(string $attrFoFontStyle): XMapStyleTypePropertiesEntity
    {
        $this->attrFoFontStyle = $attrFoFontStyle;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoFontWeight(): string
    {
        return $this->attrFoFontWeight;
    }

    /**
     * @param string $attrFoFontWeight
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoFontWeight(string $attrFoFontWeight): XMapStyleTypePropertiesEntity
    {
        $this->attrFoFontWeight = $attrFoFontWeight;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgHeight(): string
    {
        return $this->attrSvgHeight;
    }

    /**
     * @param string $attrSvgHeight
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgHeight(string $attrSvgHeight): XMapStyleTypePropertiesEntity
    {
        $this->attrSvgHeight = $attrSvgHeight;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLineClass(): string
    {
        return $this->attrLineClass;
    }

    /**
     * @param string $attrLineClass
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLineClass(string $attrLineClass): XMapStyleTypePropertiesEntity
    {
        $this->attrLineClass = $attrLineClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLineColor(): string
    {
        return $this->attrLineColor;
    }

    /**
     * @param string $attrLineColor
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLineColor(string $attrLineColor): XMapStyleTypePropertiesEntity
    {
        $this->attrLineColor = $attrLineColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLineCorner(): string
    {
        return $this->attrLineCorner;
    }

    /**
     * @param string $attrLineCorner
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLineCorner(string $attrLineCorner): XMapStyleTypePropertiesEntity
    {
        $this->attrLineCorner = $attrLineCorner;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLinePattern(): string
    {
        return $this->attrLinePattern;
    }

    /**
     * @param string $attrLinePattern
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLinePattern(string $attrLinePattern): XMapStyleTypePropertiesEntity
    {
        $this->attrLinePattern = $attrLinePattern;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLineTapered(): string
    {
        return $this->attrLineTapered;
    }

    /**
     * @param string $attrLineTapered
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLineTapered(string $attrLineTapered): XMapStyleTypePropertiesEntity
    {
        $this->attrLineTapered = $attrLineTapered;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLineWidth(): string
    {
        return $this->attrLineWidth;
    }

    /**
     * @param string $attrLineWidth
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLineWidth(string $attrLineWidth): XMapStyleTypePropertiesEntity
    {
        $this->attrLineWidth = $attrLineWidth;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoMarginBottom(): string
    {
        return $this->attrFoMarginBottom;
    }

    /**
     * @param string $attrFoMarginBottom
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoMarginBottom(string $attrFoMarginBottom): XMapStyleTypePropertiesEntity
    {
        $this->attrFoMarginBottom = $attrFoMarginBottom;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoMarginLeft(): string
    {
        return $this->attrFoMarginLeft;
    }

    /**
     * @param string $attrFoMarginLeft
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoMarginLeft(string $attrFoMarginLeft): XMapStyleTypePropertiesEntity
    {
        $this->attrFoMarginLeft = $attrFoMarginLeft;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoMarginRight(): string
    {
        return $this->attrFoMarginRight;
    }

    /**
     * @param string $attrFoMarginRight
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoMarginRight(string $attrFoMarginRight): XMapStyleTypePropertiesEntity
    {
        $this->attrFoMarginRight = $attrFoMarginRight;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoMarginTop(): string
    {
        return $this->attrFoMarginTop;
    }

    /**
     * @param string $attrFoMarginTop
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoMarginTop(string $attrFoMarginTop): XMapStyleTypePropertiesEntity
    {
        $this->attrFoMarginTop = $attrFoMarginTop;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrMultiLineColors(): string
    {
        return $this->attrMultiLineColors;
    }

    /**
     * @param string $attrMultiLineColors
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrMultiLineColors(string $attrMultiLineColors): XMapStyleTypePropertiesEntity
    {
        $this->attrMultiLineColors = $attrMultiLineColors;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgOpacity(): string
    {
        return $this->attrSvgOpacity;
    }

    /**
     * @param string $attrSvgOpacity
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgOpacity(string $attrSvgOpacity): XMapStyleTypePropertiesEntity
    {
        $this->attrSvgOpacity = $attrSvgOpacity;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrShapeClass(): string
    {
        return $this->attrShapeClass;
    }

    /**
     * @param string $attrShapeClass
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrShapeClass(string $attrShapeClass): XMapStyleTypePropertiesEntity
    {
        $this->attrShapeClass = $attrShapeClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrShapeCorner(): string
    {
        return $this->attrShapeCorner;
    }

    /**
     * @param string $attrShapeCorner
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrShapeCorner(string $attrShapeCorner): XMapStyleTypePropertiesEntity
    {
        $this->attrShapeCorner = $attrShapeCorner;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSpacingMajor(): string
    {
        return $this->attrSpacingMajor;
    }

    /**
     * @param string $attrSpacingMajor
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSpacingMajor(string $attrSpacingMajor): XMapStyleTypePropertiesEntity
    {
        $this->attrSpacingMajor = $attrSpacingMajor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSpacingMinor(): string
    {
        return $this->attrSpacingMinor;
    }

    /**
     * @param string $attrSpacingMinor
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSpacingMinor(string $attrSpacingMinor): XMapStyleTypePropertiesEntity
    {
        $this->attrSpacingMinor = $attrSpacingMinor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoTextAlign(): string
    {
        return $this->attrFoTextAlign;
    }

    /**
     * @param string $attrFoTextAlign
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoTextAlign(string $attrFoTextAlign): XMapStyleTypePropertiesEntity
    {
        $this->attrFoTextAlign = $attrFoTextAlign;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoTextBullet(): string
    {
        return $this->attrFoTextBullet;
    }

    /**
     * @param string $attrFoTextBullet
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoTextBullet(string $attrFoTextBullet): XMapStyleTypePropertiesEntity
    {
        $this->attrFoTextBullet = $attrFoTextBullet;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgWidth(): string
    {
        return $this->attrSvgWidth;
    }

    /**
     * @param string $attrSvgWidth
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgWidth(string $attrSvgWidth): XMapStyleTypePropertiesEntity
    {
        $this->attrSvgWidth = $attrSvgWidth;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgX(): string
    {
        return $this->attrSvgX;
    }

    /**
     * @param string $attrSvgX
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgX(string $attrSvgX): XMapStyleTypePropertiesEntity
    {
        $this->attrSvgX = $attrSvgX;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgY(): string
    {
        return $this->attrSvgY;
    }

    /**
     * @param string $attrSvgY
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgY(string $attrSvgY): XMapStyleTypePropertiesEntity
    {
        $this->attrSvgY = $attrSvgY;
        return $this;
    }

    /**
     * @return XMapDefaultStyleEntity
     */
    public function getDefaultStyle(): XMapDefaultStyleEntity
    {
        return $this->defaultStyle;
    }

    /**
     * @param XMapDefaultStyleEntity $defaultStyle
     * @return XMapStyleTypePropertiesEntity
     */
    public function setDefaultStyle(XMapDefaultStyleEntity $defaultStyle): XMapStyleTypePropertiesEntity
    {
        $this->defaultStyle = $defaultStyle;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        if ($this->attrAngle !== null) $xmlWriter->writeAttribute("angle", $this->attrAngle);//        angle
        if ($this->attrArrowBeginClass !== null) $xmlWriter->writeAttribute("arrow-begin-class", $this->attrArrowBeginClass);//arrow-begin-class
        if ($this->attrArrowEndClass !== null) $xmlWriter->writeAttribute("arrow-end-class", $this->attrArrowEndClass);//arrow-end-class
        if ($this->attrBackground !== null) $xmlWriter->writeAttribute("background", $this->attrBackground);//background
        if ($this->attrFoBackgroundColor !== null) $xmlWriter->writeAttribute("fo:background-color", $this->attrFoBackgroundColor);//fo:background-color
        if ($this->attrFoColor !== null) $xmlWriter->writeAttribute("fo:color", $this->attrFoColor);//fo:color
        if ($this->attrSvgFill !== null) $xmlWriter->writeAttribute("svg:fill", $this->attrSvgFill);//svg:fill
        if ($this->attrFoTextDecoration !== null) $xmlWriter->writeAttribute("fo:text-decoration", $this->attrFoTextDecoration);//fo:text-decoration
        if ($this->attrFoFontFamily !== null) $xmlWriter->writeAttribute("fo:font-family", $this->attrFoFontFamily);//fo:font-family
        if ($this->attrFoFontSize !== null) $xmlWriter->writeAttribute("fo:font-size", $this->attrFoFontSize);//fo:font-size
        if ($this->attrFoFontStyle !== null) $xmlWriter->writeAttribute("fo:font-style", $this->attrFoFontStyle);//fo:font-style
        if ($this->attrFoFontWeight !== null) $xmlWriter->writeAttribute("fo:font-weight", $this->attrFoFontWeight);//fo:font-weight
        if ($this->attrSvgHeight !== null) $xmlWriter->writeAttribute("svg:height", $this->attrSvgHeight);//svg:height
        if ($this->attrLineClass !== null) $xmlWriter->writeAttribute("line-class", $this->attrLineClass);//line-class
        if ($this->attrLineColor !== null) $xmlWriter->writeAttribute("line-color", $this->attrLineColor);//line-color
        if ($this->attrLineCorner !== null) $xmlWriter->writeAttribute("line-corner", $this->attrLineCorner);//line-corner
        if ($this->attrLinePattern !== null) $xmlWriter->writeAttribute("line-pattern", $this->attrLinePattern);//line-pattern
        if ($this->attrLineTapered !== null) $xmlWriter->writeAttribute("line-tapered", $this->attrLineTapered);//line-tapered
        if ($this->attrLineWidth !== null) $xmlWriter->writeAttribute("line-width", $this->attrLineWidth);//line-width
        if ($this->attrFoMarginBottom !== null) $xmlWriter->writeAttribute("fo:margin-bottom", $this->attrFoMarginBottom);//fo:margin-bottom
        if ($this->attrFoMarginLeft !== null) $xmlWriter->writeAttribute("fo:margin-left", $this->attrFoMarginLeft);//fo:margin-left
        if ($this->attrFoMarginRight !== null) $xmlWriter->writeAttribute("fo:margin-right", $this->attrFoMarginRight);//fo:margin-right
        if ($this->attrFoMarginTop !== null) $xmlWriter->writeAttribute("fo:margin-top", $this->attrFoMarginTop);//fo:margin-top
        if ($this->attrMultiLineColors !== null) $xmlWriter->writeAttribute("multi-line-colors", $this->attrMultiLineColors);//multi-line-colors
        if ($this->attrSvgOpacity !== null) $xmlWriter->writeAttribute("svg:opacity", $this->attrSvgOpacity);//svg:opacity
        if ($this->attrShapeClass !== null) $xmlWriter->writeAttribute("shape-class", $this->attrShapeClass);//shape-class
        if ($this->attrShapeCorner !== null) $xmlWriter->writeAttribute("shape-corner", $this->attrShapeCorner);//shape-corner
        if ($this->attrSpacingMajor !== null) $xmlWriter->writeAttribute("spacing-major", $this->attrSpacingMajor);//spacing-major
        if ($this->attrSpacingMinor !== null) $xmlWriter->writeAttribute("spacing-minor", $this->attrSpacingMinor);//spacing-minor
        if ($this->attrFoTextAlign !== null) $xmlWriter->writeAttribute("fo:text-align", $this->attrFoTextAlign);//fo:text-align
        if ($this->attrFoTextBullet !== null) $xmlWriter->writeAttribute("fo:text-bullet", $this->attrFoTextBullet);//fo:text-bullet
        if ($this->attrSvgWidth !== null) $xmlWriter->writeAttribute("svg:width", $this->attrSvgWidth);//svg:width
        if ($this->attrSvgX !== null) $xmlWriter->writeAttribute("svg:x", $this->attrSvgX);//svg:x
        if ($this->attrSvgY !== null) $xmlWriter->writeAttribute("svg:y", $this->attrSvgY);//svg:y

        self::writeThatNode($xmlWriter, $this->defaultStyle);
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return $this->type . '-properties';
    }
}