unit uBanco;

interface

uses IniFiles, SysUtils, Classes, DBXFirebird, DB, SqlExpr;

type
  TdmBanco = class(TDataModule)
    connDB1: TSQLConnection;
    procedure DataModuleCreate(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  dmBanco: TdmBanco;

implementation

{$R *.dfm}

procedure TdmBanco.DataModuleCreate(Sender: TObject);
var
  ini:TiniFile;
  S:String;
  i:Integer;
  B:Boolean;
  database, username, password: String;
begin
  try
    connDB1.Connected := False;
    ini := TIniFile.Create(GetCurrentDir + '\db1.config.ini'); //default directory is Window's directory!!
    if FileExists(GetCurrentDir + '\db1.config.ini') then
    begin
      database := ini.readString('CONFIG','database','');
      username := ini.readString('CONFIG','username','');
      password := ini.readString('CONFIG','password','');
    end;
    connDB1.Connected := True;
  finally
     ini.free;
  end;
end;

end.
