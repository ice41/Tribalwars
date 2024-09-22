#!D:\servers\servers\tralha tribalwars\Silnik Plemiona v8.3 by Bartekst221 pt\perl\bin\perl.exe
use strict;
use warnings;
use Getopt::Long;
use File::Spec::Functions qw(catfile catdir);

# ====================================================================
#
#  Copyright 2003-2004  The Apache Software Foundation
#
#  Licensed under the Apache License, Version 2.0 (the "License");
#  you may not use this file except in compliance with the License.
#  You may obtain a copy of the License at
#
#      http://www.apache.org/licenses/LICENSE-2.0
#
#  Unless required by applicable law or agreed to in writing, software
#  distributed under the License is distributed on an "AS IS" BASIS,
#  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
#  See the License for the specific language governing permissions and
#  limitations under the License.
# ====================================================================
#
# APR-util script designed to allow easy command line access to APR-util
# configuration parameters.


sub usage {
    print << 'EOU';
Usage: apu-config [OPTION]

Known values for OPTION are:
  --prefix[=DIR]    change prefix to DIR
  --bindir          print location where binaries are installed
  --includedir      print location where headers are installed
  --libdir          print location where libraries are installed
  --cc              print C compiler name
  --cpp             print C preprocessor name and any required options
  --ld              print C linker name
  --cflags          print C compiler flags
  --cppflags        print cpp flags
  --includes        print include information
  --ldflags         print linker flags
  --libs            print additional libraries to link against
  --srcdir          print APR-util source directory
  --installbuilddir print APR-util build helper directory
  --link-ld         print link switch(es) for linking to APR-util
  --apu-so-ext      print the extensions of shared objects on this platform
  --apu-lib-file    print the name of the aprutil lib
  --version         print the APR-util version as a dotted triple
  --help            print this help

When linking, an application should do something like:
  APU_LIBS="\`apu-config --link-ld --libs\`"

An application should use the results of --cflags, --cppflags, --includes,
and --ldflags in their build process.

EOU
    exit(1);
}

my ${CC} = q[cl];
my ${LIBS} = q[];
my ${installbuilddir} = q[D:\servers\servers\tralha tribalwars\Silnik Plemiona v8.3 by Bartekst221 pt\apache\build];
my ${APRUTIL_LIB_TARGET} = q[];
my ${bindir} = q[D:\servers\servers\tralha tribalwars\Silnik Plemiona v8.3 by Bartekst221 pt\apache\bin];
my ${APRUTIL_SO_EXT} = q[dll];
my ${LD} = q[link];
my ${CPP} = q[cl -nologo -E];
my ${LDFLAGS} = q[ kernel32.lib /nologo /subsystem:windows /dll /machine:I386 ];
my ${includedir} = q[D:\servers\servers\tralha tribalwars\Silnik Plemiona v8.3 by Bartekst221 pt\apache\include];
my ${exec_prefix} = q[D:\servers\servers\tralha tribalwars\Silnik Plemiona v8.3 by Bartekst221 pt\apache];
my ${datadir} = q[D:\servers\servers\tralha tribalwars\Silnik Plemiona v8.3 by Bartekst221 pt\apache];
my ${APRUTIL_LIBNAME} = q[libaprutil-1.lib];
my ${libdir} = q[D:\servers\servers\tralha tribalwars\Silnik Plemiona v8.3 by Bartekst221 pt\apache\lib];
my ${APRUTIL_DOTTED_VERSION} = q[1.2.3];
my ${CFLAGS} = q[ /nologo /MD /W3 /O2 /D WIN32 /D _WINDOWS /D NDEBUG ];
my ${SHELL} = q[D:\servers\servers\tralha tribalwars\Silnik Plemiona v8.3 by Bartekst221 pt\WINDOWS\system32\cmd.exe];
my ${CPPFLAGS} = q[];
my ${EXTRA_INCLUDES} = q[];
my ${APRUTIL_SOURCE_DIR} = q[];
my ${prefix} = q[D:\servers\servers\tralha tribalwars\Silnik Plemiona v8.3 by Bartekst221 pt\apache];
my ${APRUTIL_MAJOR_VERSION} = q[1];

my %opts = ();
GetOptions(\%opts,
           'prefix:s',
           'bindir',
           'includedir',
           'libdir',
           'cc',
           'cpp',
           'ld',
           'cflags',
           'cppflags',
           'includes',
           'ldflags',
           'libs',
           'srcdir',
           'installbuilddir',
           'link-ld',
           'apu-so-ext',
           'apu-lib-file',
           'version',
           'help'
          ) or usage();

usage() if ($opts{help} or not %opts);

if (exists $opts{prefix} and $opts{prefix} eq "") {
    print qq{$prefix\n};
    exit(0);
}
my $user_prefix = defined $opts{prefix} ? $opts{prefix} : '';
my %user_dir;
if ($user_prefix) {
    foreach (qw(lib bin include build)) {
        $user_dir{$_} = catdir $user_prefix, $_;
    }
}

my $flags = '';

SWITCH : {
    local $\ = "\n";
    $opts{bindir} and do {
        print $user_prefix ? $user_dir{bin} : $bindir;
        last SWITCH;
    };
    $opts{includedir} and do {
        print $user_prefix ? $user_dir{include} : $includedir;
        last SWITCH;
    };
    $opts{libdir} and do {
        print $user_prefix ? $user_dir{lib} : $libdir;
        last SWITCH;
    };
    $opts{installbuilddir} and do {
        print $user_prefix ? $user_dir{build} : $installbuilddir;
        last SWITCH;
    };
    $opts{srcdir} and do {
        print $APRUTIL_SOURCE_DIR;
        last SWITCH;
    };
    $opts{cc} and do {
        print $CC;
        last SWITCH;
    };
    $opts{cpp} and do {
        print $CPP;
        last SWITCH;
    };
    $opts{ld} and do {
        print $LD;
        last SWITCH;
    };
    $opts{cflags} and $flags .= " $CFLAGS ";
    $opts{cppflags} and $flags .= " $CPPFLAGS ";
    $opts{includes} and do {
        my $inc = $user_prefix ? $user_dir{include} : $includedir;
        $flags .= qq{ /I"$inc" $EXTRA_INCLUDES };
    };
    $opts{ldflags} and $flags .= " $LDFLAGS ";
    $opts{libs} and $flags .= " $LIBS ";
    $opts{'link-ld'} and do {
        my $libpath = $user_prefix ? $user_dir{lib} : $libdir;
        $flags .= qq{ /libpath:"$libpath" $APRUTIL_LIBNAME };
    };
    $opts{'apu-so-ext'} and do {
        print $APRUTIL_SO_EXT;
        last SWITCH;
    };
    $opts{'apu-lib-file'} and do {
        my $full_apulib = $user_prefix ? 
            (catfile $user_dir{lib}, $APRUTIL_LIBNAME) :
                (catfile $libdir, $APRUTIL_LIBNAME);
        print $full_apulib;
        last SWITCH;
    };
    $opts{version} and do {
        print $APRUTIL_DOTTED_VERSION;
        last SWITCH;
    };
    print $flags if $flags;
}
exit(0);
