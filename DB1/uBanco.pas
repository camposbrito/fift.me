unit uBanco;

interface

uses IniFiles, SysUtils, Classes, DBXFirebird, DB, SqlExpr;

type
  TdmBanco = class(TDataModule)
    connDB1: TSQLConnection;
    procedure DataModuleCreate(Sender: TObject);
    procedure DataModuleDestroy(Sender: TObject);
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
  database, username, password: String;
begin
try
  ini := TIniFile.Create(GetCurrentDir + '\db1.config.ini'); //default directory is Window's directory!!
  try
    connDB1.Connected := False;

    if FileExists(GetCurrentDir + '\db1.config.ini') then
    begin
      database := ini.readString('CONFIG','database','');
      username := ini.readString('CONFIG','username','');
      password := ini.readString('CONFIG','password','');
    end;
  finally
     ini.free;
  end;
except on E: Exception do
  raise Exception.Create(e.Message);
end;

end;

procedure TdmBanco.DataModuleDestroy(Sender: TObject);
begin
  if (dmBanco.connDB1.Connected) then
    dmBanco.connDB1.Close;
end;

end.
