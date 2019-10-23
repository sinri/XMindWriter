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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return XMapStyleTypePropertiesEntity
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrAngle()
    {
        return $this->attrAngle;
    }

    /**
     * @param string $attrAngle
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrAngle($attrAngle)
    {
        $this->attrAngle = $attrAngle;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrArrowBeginClass()
    {
        return $this->attrArrowBeginClass;
    }

    /**
     * @param string $attrArrowBeginClass
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrArrowBeginClass($attrArrowBeginClass)
    {
        $this->attrArrowBeginClass = $attrArrowBeginClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrArrowEndClass()
    {
        return $this->attrArrowEndClass;
    }

    /**
     * @param string $attrArrowEndClass
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrArrowEndClass($attrArrowEndClass)
    {
        $this->attrArrowEndClass = $attrArrowEndClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrBackground()
    {
        return $this->attrBackground;
    }

    /**
     * @param string $attrBackground
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrBackground($attrBackground)
    {
        $this->attrBackground = $attrBackground;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoBackgroundColor()
    {
        return $this->attrFoBackgroundColor;
    }

    /**
     * @param string $attrFoBackgroundColor
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoBackgroundColor($attrFoBackgroundColor)
    {
        $this->attrFoBackgroundColor = $attrFoBackgroundColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoColor()
    {
        return $this->attrFoColor;
    }

    /**
     * @param string $attrFoColor
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoColor($attrFoColor)
    {
        $this->attrFoColor = $attrFoColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgFill()
    {
        return $this->attrSvgFill;
    }

    /**
     * @param string $attrSvgFill
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgFill($attrSvgFill)
    {
        $this->attrSvgFill = $attrSvgFill;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoTextDecoration()
    {
        return $this->attrFoTextDecoration;
    }

    /**
     * @param string $attrFoTextDecoration
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoTextDecoration($attrFoTextDecoration)
    {
        $this->attrFoTextDecoration = $attrFoTextDecoration;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoFontFamily()
    {
        return $this->attrFoFontFamily;
    }

    /**
     * @param string $attrFoFontFamily
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoFontFamily($attrFoFontFamily)
    {
        $this->attrFoFontFamily = $attrFoFontFamily;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoFontSize()
    {
        return $this->attrFoFontSize;
    }

    /**
     * @param string $attrFoFontSize
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoFontSize($attrFoFontSize)
    {
        $this->attrFoFontSize = $attrFoFontSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoFontStyle()
    {
        return $this->attrFoFontStyle;
    }

    /**
     * @param string $attrFoFontStyle
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoFontStyle($attrFoFontStyle)
    {
        $this->attrFoFontStyle = $attrFoFontStyle;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoFontWeight()
    {
        return $this->attrFoFontWeight;
    }

    /**
     * @param string $attrFoFontWeight
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoFontWeight($attrFoFontWeight)
    {
        $this->attrFoFontWeight = $attrFoFontWeight;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgHeight()
    {
        return $this->attrSvgHeight;
    }

    /**
     * @param string $attrSvgHeight
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgHeight($attrSvgHeight)
    {
        $this->attrSvgHeight = $attrSvgHeight;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLineClass()
    {
        return $this->attrLineClass;
    }

    /**
     * @param string $attrLineClass
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLineClass($attrLineClass)
    {
        $this->attrLineClass = $attrLineClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLineColor()
    {
        return $this->attrLineColor;
    }

    /**
     * @param string $attrLineColor
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLineColor($attrLineColor)
    {
        $this->attrLineColor = $attrLineColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLineCorner()
    {
        return $this->attrLineCorner;
    }

    /**
     * @param string $attrLineCorner
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLineCorner($attrLineCorner)
    {
        $this->attrLineCorner = $attrLineCorner;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLinePattern()
    {
        return $this->attrLinePattern;
    }

    /**
     * @param string $attrLinePattern
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLinePattern($attrLinePattern)
    {
        $this->attrLinePattern = $attrLinePattern;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLineTapered()
    {
        return $this->attrLineTapered;
    }

    /**
     * @param string $attrLineTapered
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLineTapered($attrLineTapered)
    {
        $this->attrLineTapered = $attrLineTapered;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrLineWidth()
    {
        return $this->attrLineWidth;
    }

    /**
     * @param string $attrLineWidth
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrLineWidth($attrLineWidth)
    {
        $this->attrLineWidth = $attrLineWidth;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoMarginBottom()
    {
        return $this->attrFoMarginBottom;
    }

    /**
     * @param string $attrFoMarginBottom
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoMarginBottom($attrFoMarginBottom)
    {
        $this->attrFoMarginBottom = $attrFoMarginBottom;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoMarginLeft()
    {
        return $this->attrFoMarginLeft;
    }

    /**
     * @param string $attrFoMarginLeft
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoMarginLeft($attrFoMarginLeft)
    {
        $this->attrFoMarginLeft = $attrFoMarginLeft;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoMarginRight()
    {
        return $this->attrFoMarginRight;
    }

    /**
     * @param string $attrFoMarginRight
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoMarginRight($attrFoMarginRight)
    {
        $this->attrFoMarginRight = $attrFoMarginRight;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoMarginTop()
    {
        return $this->attrFoMarginTop;
    }

    /**
     * @param string $attrFoMarginTop
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoMarginTop($attrFoMarginTop)
    {
        $this->attrFoMarginTop = $attrFoMarginTop;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrMultiLineColors()
    {
        return $this->attrMultiLineColors;
    }

    /**
     * @param string $attrMultiLineColors
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrMultiLineColors($attrMultiLineColors)
    {
        $this->attrMultiLineColors = $attrMultiLineColors;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgOpacity()
    {
        return $this->attrSvgOpacity;
    }

    /**
     * @param string $attrSvgOpacity
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgOpacity($attrSvgOpacity)
    {
        $this->attrSvgOpacity = $attrSvgOpacity;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrShapeClass()
    {
        return $this->attrShapeClass;
    }

    /**
     * @param string $attrShapeClass
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrShapeClass($attrShapeClass)
    {
        $this->attrShapeClass = $attrShapeClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrShapeCorner()
    {
        return $this->attrShapeCorner;
    }

    /**
     * @param string $attrShapeCorner
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrShapeCorner($attrShapeCorner)
    {
        $this->attrShapeCorner = $attrShapeCorner;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSpacingMajor()
    {
        return $this->attrSpacingMajor;
    }

    /**
     * @param string $attrSpacingMajor
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSpacingMajor($attrSpacingMajor)
    {
        $this->attrSpacingMajor = $attrSpacingMajor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSpacingMinor()
    {
        return $this->attrSpacingMinor;
    }

    /**
     * @param string $attrSpacingMinor
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSpacingMinor($attrSpacingMinor)
    {
        $this->attrSpacingMinor = $attrSpacingMinor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoTextAlign()
    {
        return $this->attrFoTextAlign;
    }

    /**
     * @param string $attrFoTextAlign
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoTextAlign($attrFoTextAlign)
    {
        $this->attrFoTextAlign = $attrFoTextAlign;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrFoTextBullet()
    {
        return $this->attrFoTextBullet;
    }

    /**
     * @param string $attrFoTextBullet
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrFoTextBullet($attrFoTextBullet)
    {
        $this->attrFoTextBullet = $attrFoTextBullet;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgWidth()
    {
        return $this->attrSvgWidth;
    }

    /**
     * @param string $attrSvgWidth
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgWidth($attrSvgWidth)
    {
        $this->attrSvgWidth = $attrSvgWidth;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgX()
    {
        return $this->attrSvgX;
    }

    /**
     * @param string $attrSvgX
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgX($attrSvgX)
    {
        $this->attrSvgX = $attrSvgX;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrSvgY()
    {
        return $this->attrSvgY;
    }

    /**
     * @param string $attrSvgY
     * @return XMapStyleTypePropertiesEntity
     */
    public function setAttrSvgY($attrSvgY)
    {
        $this->attrSvgY = $attrSvgY;
        return $this;
    }

    /**
     * @return XMapDefaultStyleEntity
     */
    public function getDefaultStyle()
    {
        return $this->defaultStyle;
    }

    /**
     * @param XMapDefaultStyleEntity $defaultStyle
     * @return XMapStyleTypePropertiesEntity
     */
    public function setDefaultStyle($defaultStyle)
    {
        $this->defaultStyle = $defaultStyle;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
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

    protected function nodeTag()
    {
        return $this->type . '-properties';
    }
}