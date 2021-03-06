Graphics3D 800,600,16,1
SetBuffer BackBuffer()

player=CreatePivot()
PositionEntity player,1,1,-5
EntityRadius player,.9
EntityType player,1

camera=CreateCamera( player )
TranslateEntity camera,0,0.9,0
CameraRange camera,.1,200
CameraZoom camera, 1

;CameraFogMode camera, True   ; ????????
;CameraFogColor camera, 50,0,0 
;CameraFogRange camera, 0.9, 10

Const TypePlayer1=1,TypeDom=2
Player1=CreatePivot()
EntityType Player1,TypePlayer

zero = LoadMesh("zero.3ds")
ScaleEntity zero, 0.006, 0.006, 0.006
PositionEntity zero, 0, 0.6, 0
RotateEntity zero, 0, 90, 270
EntityAlpha zero, 0.5    ; ????????????

dom = LoadMesh("dom0.3ds")
dom_tex=LoadTexture("056.jpg")
ScaleTexture dom_tex, 0.3, 0.3
EntityTexture dom, dom_tex
ScaleEntity dom, 0.005, 0.005, 0.005
PositionEntity dom, 0, 2.3, 0
RotateEntity dom, 270, 270, 180
EntityFX dom, 16  ; ???????????? ???????????

wall = LoadMesh("wall.3ds")
wall_tex=LoadTexture("brick10.jpg")
ScaleTexture wall_tex,1,0.1
EntityTexture wall, wall_tex
ScaleEntity wall, 0.5, 0.05, 0.5
PositionEntity wall, 0, 0, 0
RotateEntity wall, 0, 90, 0

nebo = LoadMesh("nebo.3ds")
nebo_tex=LoadTexture("pool3d_4b2.jpg")
ScaleTexture nebo_tex,1,1
EntityTexture nebo, nebo_tex
ScaleEntity nebo, 2, 2, 2
PositionEntity nebo, 0, 0, 0
RotateEntity nebo, 0, 45, 0

EntityType dom,TypeDom
EntityType zero,TypeDom
EntityType wall,TypeDom

Collisions TypePlayer1,TypeDom,1,3


;-----------------3ByK----------------

;Global sndPlayerDie
;sndPlayerDie=LoadSound("01 give unto me.mp3")
;PlaySound sndPlayerDie

;-------------------------------------

ground=CreatePlane()
tex=LoadTexture("metalfloor_wall_14b.jpg")
EntityTexture ground,tex
EntityType ground,2

sp#=.05 
shoe_size#=6.0 ; (7=running, 4=walking)
head_bang_X#=0.05 
head_bang_Y#=0.05

Collisions 1,2,2,2

While Not KeyHit(1)


 mxs#=MouseXSpeed()/4.0
 mys#=MouseYSpeed()/4.0
 MoveMouse GraphicsWidth()/2,GraphicsHeight()/2
 camxa#=camxa-mxs Mod 360
 camya#=camya+mys
 If camya<-90 Then camya=-90
 If camya>90 Then camya=90
 RotateEntity player,0,camxa,0
 RotateEntity camera,camya,0,0

 MoveEntity player,0,-.2,0 ; simplified gravity

 walking=0
 If KeyDown(30) Then: MoveEntity player,-sp,0,0 : walking=1: EndIf
 If KeyDown(32) Then: MoveEntity player, sp,0,0 : walking=1: EndIf
 If KeyDown(17) Then: MoveEntity player,0,0, sp : walking=1: EndIf
 If KeyDown(31) Then: MoveEntity player,0,0,-sp : walking=1: EndIf

If KeyDown(200) Then: MoveEntity player,0,1,0 : walking=1: EndIf


 If walking=1
 a1#=(a1#+shoe_size) Mod 360
  Else
  ;a1#=a1#*0.8
 EndIf
 PositionEntity camera,Cos(a1#)*head_bang_X#,Sin(90+a1#*2)*head_bang_Y#,0,0

 UpdateWorld
 RenderWorld


 VWait:Flip 0
Wend

End